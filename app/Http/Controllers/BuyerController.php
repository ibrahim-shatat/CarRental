<?php

namespace App\Http\Controllers;

use App\Models\Buyer;
use App\Models\Car;
use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class BuyerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buyers = Buyer::orderBy('id' , 'desc')->paginate(10);
        $this->authorize('viewAny' , Buyer::class);

        return response()->view('cms.buyers.index' , compact('buyers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        $roles = Role::where('guard_name','buyer')->get();
        $this->authorize('create' , Buyer::class);

        return response()->view('cms.buyers.create' , compact('cities','roles'));
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
            'email' => 'required|unique:buyers,email',
        ] , [

        ]);
        $this->authorize('create' , Buyer::class);

        if(! $validator->fails()){

            $buyers = new Buyer();

            $buyers->email = $request->get('email');
            $buyers->password = Hash::make($request->get('password')) ;

            $isSaved = $buyers->save();
            if($isSaved){
                $users = new User();
                if (request()->hasFile('image')) {

                    $image = $request->file('image');

                    $imageName = time() . 'image.' . $image->getClientOriginalExtension();

                    $image->move('storage/images/buyer', $imageName);

                    $users->image = $imageName;
                }
                $roles = Role::findOrFail($request->get('role_id'));
                $buyers->assignRole($roles->name);
                $users->first_name = $request->get('first_name');
                $users->last_name = $request->get('last_name');
                $users->mobile = $request->get('mobile');
                $users->age = $request->get('age');
                $users->gender = $request->get('gender');
                $users->city_id = $request->get('city_id');
                $users->actor()->associate($buyers);
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
        $buyers = Buyer::findOrFail($id);
        $cities = City::all();
        $this->authorize('view' , Buyer::class);

        return response()->view('cms.buyers.show' , compact('buyers' ,'cities'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::where('guard_name','buyer')->get();
        $buyers = Buyer::findOrFail($id);
        $cities = City::all();
        $this->authorize('update' , Buyer::class);


        return response()->view('cms.buyers.edit' , compact('buyers' ,'cities' ,'roles'));
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
        $this->authorize('update' , Buyer::class);

        if(! $validator->fails()){
            $buyers = Buyer::findOrFail($id);
            $buyers->email = $request->get('email');

        $isUpdated = $buyers->save();

        if($isUpdated){
            $users = $buyers->user;

            if (request()->hasFile('image')) {

                $image = $request->file('image');

                $imageName = time() . 'image.' . $image->getClientOriginalExtension();

                $image->move('storage/images/buyer', $imageName);

                $users->image = $imageName;
            }
            $roles = Role::findOrFail($request->get('role_id'));
            $buyers->assignRole($roles->name);
            $users->first_name = $request->get('first_name');
            $users->last_name = $request->get('last_name');
            $users->mobile = $request->get('mobile');
            $users->age = $request->get('age');
            $users->gender = $request->get('gender');
            $users->city_id = $request->get('city_id');
            $users->actor()->associate($buyers);
            $isUpdated = $users->save();

            return ['redirect' =>route('buyers.index')];

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
        $this->authorize('delete' , Buyer::class);

        $buyers = Buyer::destroy($id);
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
            $admins = Buyer::findOrFail($id);
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