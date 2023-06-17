<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Car;
use App\Models\City;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::orderBy('id' , 'desc')->paginate(10);
        $this->authorize('viewAny' , Supplier::class);

        return response()->view('cms.suppliers.index' , compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        $cars = Car::all();
        $this->authorize('create' , Supplier::class);
        $roles = Role::where('guard_name','supplier')->get();

        return response()->view('cms.suppliers.create' , compact('cities','cars','roles'));
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
            'first_name' => 'required',
            'email' => 'required|unique:suppliers,email',
        ] , [

        ]);
        $this->authorize('create' , Supplier::class);

        if(! $validator->fails()){
            $suppliers = new Supplier();
            $suppliers->email = $request->get('email');
            $suppliers->password = Hash::make($request->get('password')) ;

            $isSaved = $suppliers->save();
            if($isSaved){
                $users = new User();
                if (request()->hasFile('image')) {

                    $image = $request->file('image');

                    $imageName = time() . 'image.' . $image->getClientOriginalExtension();

                    $image->move('storage/images/supplier', $imageName);

                    $users->image = $imageName;
                    }
                $roles = Role::findOrFail($request->get('role_id'));
                $suppliers->assignRole($roles->name);
                $users->first_name = $request->get('first_name');
                $users->last_name = $request->get('last_name');
                $users->mobile = $request->get('mobile');
                $users->age = $request->get('age');
                $users->gender = $request->get('gender');
                $users->city_id = $request->get('city_id');
                $users->actor()->associate($suppliers);
                $isSaved = $users->save();

                return response()->json([
                    'icon' => 'success' ,
                    'title' => 'Created is Successfully',
                ] , 200);

            }
        }
        else{
            return response()->json([
                'icon' => 'error' ,
                'title' => $validator->getMessageBag()->first(),
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
        $suppliers = Supplier::findOrFail($id);
        $cities = City::all();
        $this->authorize('view' , Supplier::class);

        return response()->view('cms.suppliers.show' , compact('suppliers' ,'cities'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::where('guard_name','supplier')->get();
        $suppliers = Supplier::findOrFail($id);
        $cities = City::all();
        $this->authorize('update' , Supplier::class);

        return response()->view('cms.suppliers.edit' , compact('suppliers' ,'cities','roles'));
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
            'password' => 'nullable' ,
            'image' => 'nullable' ,
            'role_id' =>'nullable' ,
        ] , [

        ]);
        $this->authorize('update' , Supplier::class);

        if(! $validator->fails()){


        $suppliers = Supplier::findOrFail($id);
        $suppliers->email = $request->get('email');

        $isUpdated = $suppliers->save();

        if($isUpdated){
            $users = $suppliers->user;

            if (request()->hasFile('image')) {

                $image = $request->file('image');

                $imageName = time() . 'image.' . $image->getClientOriginalExtension();

                $image->move('storage/images/supplier', $imageName);

                $users->image = $imageName;
                }
                $roles = Role::findOrFail($request->get('role_id'));
                $suppliers->assignRole($roles->name);
            $users->first_name = $request->get('first_name');
            $users->last_name = $request->get('last_name');
            $users->mobile = $request->get('mobile');
            $users->age = $request->get('age');
            $users->gender = $request->get('gender');
            $users->city_id = $request->get('city_id');
            $users->actor()->associate($suppliers);
            $isUpdated = $users->save();

            return ['redirect' =>route('suppliers.index')];

        }
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
        $this->authorize('delete' , Supplier::class);

           $suppliers = Supplier::destroy($id);

    }
    public function showChangePassword(){
        return response()->view('cms.auth.changepassword');
    }
    public function changePassword(Request $request, $id){
        $validator = Validator($request->all() ,[
            'oldpassword' => 'required|string|email',
            'newpassword' => 'required|string|min:6'

        ]);
        if (!$validator->fails()) {
            $admins = Supplier::findOrFail($id);
            if(!Hash::check($request->get('oldpassword'),$admins->password)){
                return response()->json(['icon' => 'error', 'title' => 'Invalid Old Password'], 400);
            }else {
                $admins->password = Hash::make($request->get('newpassword'));
                return response()->json(['icon' => 'success', 'title' => 'Passwoed Changed Successfully '], 200);
            }
        }else {
            return response()->json(['message' => $validator->getMessageBag()->first()], 400);
        }
    }
}
