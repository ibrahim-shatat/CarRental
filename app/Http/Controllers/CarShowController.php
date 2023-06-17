<?php

namespace App\Http\Controllers;

use App\Models\CarShow;
use App\Models\City;
use Illuminate\Http\Request;

class CarShowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carshows = CarShow::with('city')->orderBy('id' , 'desc')->paginate(10);
        $this->authorize('viewAny' , CarShow::class);

        return response()->view('cms.carshows.index' , compact('carshows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        $this->authorize('create' , CarShow::class);

        return response()->view('cms.carshows.create' , compact('cities'));
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
            'city_id' => 'required',
            'name' => 'required',
            'mobile' => 'required'
        ]);
        $this->authorize('create' , CarShow::class);

        if(! $validator->fails()){
            $carshows = new CarShow();
            $carshows->name = $request->get('name');
            $carshows->mobile = $request->get('mobile');
            $carshows->city_id = $request->get('city_id');
            $isSaved = $carshows->save();
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
        $carshows = CarShow::findOrFail($id);
        $this->authorize('view' , CarShow::class);

        return response()->view('cms.carshows.show' , compact('carshows'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $carshows = CarShow::findOrFail($id);
       
        $cities = City::all();
        $this->authorize('update' , CarShow::class);

        return response()->view('cms.carshows.edit' , compact('cities' , 'carshows'));
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
            'city_id' => 'required',
            'name' => 'required',
            'mobile' => 'required'
        ]);
        $this->authorize('update' , CarShow::class);

        if(! $validator->fails()){
            $carshows = CarShow::findOrFail($id);
            $carshows->name = $request->get('name');
            $carshows->mobile = $request->get('mobile');
            $carshows->city_id = $request->get('city_id');
            $isUpdated = $carshows->save();
            return ['redirect'=>route('car_shows.index')];
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
        $this->authorize('delete' , CarShow::class);

        $carshows = CarShow::destroy($id);
    }
}