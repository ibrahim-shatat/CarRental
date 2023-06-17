<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Supplier;
use Dotenv\Validator;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::with('supplier')->orderBy('id' , 'desc')->paginate(10);
        $this->authorize('viewAny' , Car::class);

        return response()->view('cms.cars.index', compact('cars'));
    }
    public function recycle(){
        $cars = Car::onlyTrashed()->paginate (10);
        return response()->view('cms.cars.recycle', compact('cars'));
    }
    public function restoreCar($id){
        $cars = Car::onlyTrashed()->findOrFail($id)->restore();
        $cars = Car::orderBy('id', 'desc')->paginate(10);
        return response()->view('cms.cars.index', compact('cars'));
    }
    public function force($id){
        $car = Car::onlyTrashed()->findOrFail($id)->forceDelete();
        $cars = Car::orderBy('id', 'desc')->paginate(10);

        return response()->view('cms.cars.index', compact('cars'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers = Supplier::all();
        $this->authorize('create' , Car::class);

        return response()->view('cms.cars.create' , compact('suppliers'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(), [
            'name' => 'string|min:3',
            'model' => 'string|min:3|max:20',
            'image'=>"required|image|max:2048|mimes:png,jpg,jpeg,pdf",
        ]);
        $this->authorize('create' , Car::class);

        if ($validator->fails()) {
            return response()->json([
                'icon' => 'error',
                'title' => $validator->getMessageBag()->first(),
            ], 400);
        } else {
            $cars = new Car();
            
            if (request()->hasFile('image')){
                $image = $request->file('image');
                $imageName = time() . 'image.' . $image->getClientOriginalExtension();
                $image->move('storage/images/car', $imageName);
                $cars->image = $imageName;
            }
            $cars->name = $request->get('name');
            $cars->color = $request->get('color');
            $cars->model = $request->get('model');
            $cars->gear_stick_type = $request->get('gear_stick_type');
            $cars->tank_type = $request->get('tank_type');
            $cars->status = $request->get('status');
            $cars->buy_price = $request->get('buy_price');
            $cars->rent_price = $request->get('rent_price');
            $cars->supplier_id = $request->get('supplier_id');
            $cars->save();
            return response()->json([
                'icon' => 'success',
                'title' => 'Car Created Succefully'
            ], 200);
            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cars = Car::findOrFail($id);
        $this->authorize('view' , Car::class);

        return response()->view('cms.cars.show',compact('cars'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cars = Car::findOrFail($id);
        $suppliers = Supplier::all();
        $this->authorize('update' , Car::class);

        return response()->view('cms.cars.edit',compact('cars','suppliers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator($request->all(), [
            'name' => 'string|min:3',
            'model' => 'string|min:3|max:20',
            'image'=>'nullable',
        ]);
        $this->authorize('update' , Car::class);

        if ($validator->fails()) {
            return response()->json([
                'icon' => 'error',
                'title' => $validator->getMessageBag()->first(),
            ], 400);
        } else {
            $cars = Car::findOrFail($id);
            if (request()->hasFile('image')){
                $image = $request->file('image');
                $imageName = time() . 'image.' . $image->getClientOriginalExtension();
                $image->move('storage/images/car', $imageName);
                $cars->image = $imageName;
            }
            $cars->name = $request->get('name');
            $cars->color = $request->get('color');
            $cars->model = $request->get('model');
            $cars->gear_stick_type = $request->get('gear_stick_type');
            $cars->tank_type = $request->get('tank_type');
            $cars->status = $request->get('status');
            $cars->buy_price = $request->get('buy_price');
            $cars->rent_price = $request->get('rent_price');
            $cars->supplier_id = $request->get('supplier_id');
            $cars->save();
            return ['redirect'=>route('cars.index')];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete' , Car::class);

        $isDeleted = Car::destroy($id);
        return ['redirect'=>route('cars.index')];
    }
}