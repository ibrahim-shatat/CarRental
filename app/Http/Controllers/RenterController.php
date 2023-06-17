<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\City;
use App\Models\Renter;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class RenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $renters = Renter::with('car')->orderBy('id' , 'desc')->paginate(10);
        $this->authorize('viewAny' , Renter::class);

        return response()->view('cms.renters.index' , compact('renters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        $roles = Role::where('guard_name','renter')->get();
        $this->authorize('create' , Renter::class);

        return response()->view('cms.renters.create' , compact('cities','roles'));
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
            'email' => 'required|unique:renters,email',
        ] , [

        ]);
        $this->authorize('create' , Renter::class);

        if(! $validator->fails()){

            $renters = new Renter();
            $renters->email = $request->get('email');
            $renters->password = Hash::make($request->get('password')) ;
            $isSaved = $renters->save();
            if($isSaved){
                $users = new User();
                if (request()->hasFile('image')) {

                    $image = $request->file('image');

                    $imageName = time() . 'image.' . $image->getClientOriginalExtension();

                    $image->move('storage/images/renter', $imageName);

                    $users->image = $imageName;
                    }
                $roles = Role::findOrFail($request->get('role_id'));
                $renters->assignRole($roles->name);
                $users->first_name = $request->get('first_name');
                $users->last_name = $request->get('last_name');
                $users->mobile = $request->get('mobile');
                $users->age = $request->get('age');
                $users->gender = $request->get('gender');
                $users->city_id = $request->get('city_id');
                $users->actor()->associate($renters);
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

        $renters = Renter::findOrFail($id);
        $cities = City::all();
        $this->authorize('view' , Renter::class);

        return response()->view('cms.renters.show' , compact('renters' ,'cities'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $renters = Renter::findOrFail($id);
        $cities = City::all();
        $roles = Role::where('guard_name','renter')->get();

        $this->authorize('update' , Renter::class);

        return response()->view('cms.renters.edit' , compact('renters' ,'cities' ,'roles'));
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
        $this->authorize('update' , Renter::class);

        if(! $validator->fails()){
            $renters = Renter::findOrFail($id);
            $renters->email = $request->get('email');
        $isUpdated = $renters->save();

        if($isUpdated){
            $users = $renters->user;

            if (request()->hasFile('image')) {

                $image = $request->file('image');

                $imageName = time() . 'image.' . $image->getClientOriginalExtension();

                $image->move('storage/images/renter', $imageName);

                $users->image = $imageName;
            }
            $roles = Role::findOrFail($request->get('role_id'));
            $renters->assignRole($roles->name);
            $users->first_name = $request->get('first_name');
            $users->last_name = $request->get('last_name');
            $users->mobile = $request->get('mobile');
            $users->age = $request->get('age');
            $users->gender = $request->get('gender');
            $users->city_id = $request->get('city_id');
            $users->actor()->associate($renters);
            $isUpdated = $users->save();

            return ['redirect' =>route('renters.index')];

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
        $this->authorize('delete' , Renter::class);

        $renters = Renter::destroy($id);
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
            $admins = Renter::findOrFail($id);
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