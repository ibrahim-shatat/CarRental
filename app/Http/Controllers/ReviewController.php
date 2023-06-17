<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Renter;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = Review::with('car','renter')->orderBy('id' ,'desc')->paginate(10);
        $this->authorize('viewAny' , Review::class);

        return response()->view('cms.reviews.index' , compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $renters = Renter::all();
        $cars = Car::all();
        $this->authorize('create' , Review::class);

        return response()->view('cms.reviews.create' , compact('renters','cars'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all() , [
            'stars' => 'required |numeric|between:0,5',
            'article' => 'string|nullable' ,
            'car_id' => 'required',
            'renter_id' => 'required'
        ]);
        $this->authorize('create' , Review::class);

        if(! $validator->fails()){
            $reviews = new Review();
            $reviews->stars = $request->get('stars');
            $reviews->article = $request->get('article');
            $reviews->car_id = $request->get('car_id');
            $reviews->renter_id = $request->get('renter_id');
            $isSaved = $reviews->save();
            return response()->json([
                'icon' => 'success',
                'title' => 'Created is Successfully'
            ] , 200);
        }
        else{
            return response()->json([
                'icon' => 'error',
                'title' => $validator->getMessageBag()->first()
            ] , 400);
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
        $reviews = Review::findOrFail($id);
        $cars = Car::all();
        $renters = Renter::all();
        $this->authorize('view' , Review::class);

        return response()->view('cms.reviews.show' , compact('renters'  ,'cars','reviews'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reviews = Review::findOrFail($id);
        $cars = Car::all();
        $renters = Renter::all();
        $this->authorize('update' , Review::class);

        return response()->view('cms.reviews.edit' , compact('renters'  ,'cars','reviews'));
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
        $validator = Validator($request->all() , [
            'stars' => 'required |numeric|between:0,5',
            'article' => 'string|nullable' ,
            'car_id' => 'required',
            'renter_id' => 'required'
        ]);
        $this->authorize('update' , Review::class);

        if(! $validator->fails()){
            $reviews = Review::findOrFail($id);
            $reviews->stars = $request->get('stars');
            $reviews->article = $request->get('article');
            $reviews->car_id = $request->get('car_id');
            $reviews->renter_id = $request->get('renter_id');
            $isSaved = $reviews->save();
            return ['redirect' =>route('reviews.index')];
        }
        else{
            return response()->json([
                'icon' => 'error',
                'title' => $validator->getMessageBag()->first()
            ] , 400);
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
        $this->authorize('delete' , Review::class);

        $reviews = Review::destroy($id);

    }
}