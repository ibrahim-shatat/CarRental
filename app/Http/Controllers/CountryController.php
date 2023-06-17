<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::withCount('cities')->orderBy('id','desc')->paginate(10);
        $this->authorize('viewAny' , Country::class);

        return response()->view('cms.countries.index' , compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create' , Country::class);

        return response()->view('cms.countries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(),[
            'name' => 'required',
            'code' => 'required'
        ]);
        $this->authorize('create' , Country::class);

        if(! $validator->fails()){
            $countries = new Country();
            $countries->name = $request->get('name');
            $countries->code = $request->get('code');
            $isSaved = $countries->save();
            return response()->json([
                'icon' => 'success',
                'title' => 'Created is Successfully',
            ] , 200);
        }
        else{
            return response()->json([
               'icon' => 'error',
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
        $countries = Country::findOrFail($id);
        $this->authorize('view' , Country::class);

        return response()->view('cms.countries.show' , compact('countries'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $countries = Country::findOrFail($id);
        $this->authorize('update' , Country::class);

        return response()->view('cms.countries.edit' , compact('countries'));
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
        $validator = validator($request->all(),[
            'name' => 'required',
            'code' => 'required'
        ]);
        $this->authorize('update' , Country::class);

        if(! $validator->fails()){
            $countries = Country::findOrFail($id);
            $countries->name = $request->get('name');
            $countries->code = $request->get('code');
            $isUpdated = $countries->save();
            return ['redirect'=>route('countries.index')];
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
        $this->authorize('delete' , Country::class);
        $countries = Country::destroy($id);
    }
}