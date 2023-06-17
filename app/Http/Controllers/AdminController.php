<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::orderBy('id' , 'desc')->paginate(10);
        $this->authorize('viewAny' , Admin::class);
        return response()->view('cms.admins.index' , compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        $this->authorize('create' , Admin::class);
        $roles = Role::where('guard_name','admin')->get();
        return response()->view('cms.admins.create' , compact('cities','roles'));
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
            'email' => 'required|unique:admins,email',
        ] , [

        ]);
        $this->authorize('create' , Admin::class);

        if(! $validator->fails()){
            $admins = new Admin();
            $admins->email = $request->get('email');
            $admins->password = Hash::make($request->get('password')) ;


            $isSaved = $admins->save();
            if($isSaved){
                $users = new User();
                if (request()->hasFile('image')) {

                    $image = $request->file('image');

                    $imageName = time() . 'image.' . $image->getClientOriginalExtension();

                    $image->move('storage/images/admin', $imageName);

                    $users->image = $imageName;
                    }
                $roles = Role::findOrFail($request->get('role_id'));
                $admins->assignRole($roles->name);
                $users->first_name = $request->get('first_name');
                $users->last_name = $request->get('last_name');
                $users->mobile = $request->get('mobile');
                $users->age = $request->get('age');
                $users->gender = $request->get('gender');
                $users->city_id = $request->get('city_id');
                $users->actor()->associate($admins);
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
        $admins = Admin::findOrFail($id);
        $cities = City::all();
        $this->authorize('view' , Admin::class);

        return response()->view('cms.admins.show' , compact('admins' ,'cities'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::where('guard_name','admin')->get();
        $admins = Admin::findOrFail($id);
        $cities = City::all();
        $this->authorize('update' , Admin::class);

        return response()->view('cms.admins.edit' , compact('admins' ,'cities','roles'));
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

        ] , [

        ]);
        $this->authorize('update' , Admin::class);

        if(! $validator->fails()){


        $admins = Admin::findOrFail($id);
        $admins->email = $request->get('email');

        $isUpdated = $admins->save();

        if($isUpdated){
            $users = $admins->user;

            if (request()->hasFile('image')) {

                $image = $request->file('image');

                $imageName = time() . 'image.' . $image->getClientOriginalExtension();

                $image->move('storage/images/admin', $imageName);

                $users->image = $imageName;
            }
            $roles = Role::findOrFail($request->get('role_id'));
            $admins->assignRole($roles->name);
            $users->first_name = $request->get('first_name');
            $users->last_name = $request->get('last_name');
            $users->mobile = $request->get('mobile');
            $users->age = $request->get('age');
            $users->gender = $request->get('gender');
            $users->city_id = $request->get('city_id');
            $users->actor()->associate($admins);
            $isUpdated = $users->save();

            return ['redirect' =>route('admins.index')];

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
        $this->authorize('update' , Admin::class);

        $admins = Admin::destroy($id);
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
            $admins = Admin::findOrFail($id);
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