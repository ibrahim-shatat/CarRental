<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::withCount('carShows')->with('country')->orderBy('id' , 'desc')->paginate(10);
        $this->authorize('viewAny' , City::class);

        return response()->view('cms.cities.index' , compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        $this->authorize('create' , City::class);

        return response()->view('cms.cities.create' , compact('countries'));
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
            'country_id' => 'required',
            'name' => 'required'
        ]);
        $this->authorize('create' , City::class);

        if(! $validator->fails()){
            $cities = new City();
            $cities->name = $request->get('name');
            $cities->country_id = $request->get('country_id');
            $isSaved = $cities->save();
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
        $cities = City::findOrFail($id);
        $this->authorize('view' , City::class);

        return response()->view('cms.cities.show' , compact('cities'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cities = City::findOrFail($id);
        $countries = Country::all();
        $this->authorize('update' , City::class);

        return response()->view('cms.cities.edit' , compact('cities' , 'countries'));
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
            'country_id' => 'required',
            'name' => 'required'
        ]);
        $this->authorize('update' , City::class);

        if(! $validator->fails()){
            $cities = City::findOrFail($id);
            $cities->name = $request->get('name');
            $cities->country_id = $request->get('country_id');
            $isUpdated = $cities->save();
            return ['redirect'=>route('cities.index')];
            return response()->json([
                'icon' => 'success',
                'title' => 'Updated is Successfully'
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete' , City::class);

        $cities = City::destroy($id);
    }
}