<?php

namespace App\Http\Controllers;

use App\Models\TimeSlot;
use Illuminate\Http\Request;

class TimeSlotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $time_slots = TimeSlot::orderBy('id' ,'desc')->paginate(10);
        $this->authorize('viewAny' , TimeSlot::class);

        return response()->view('cms.timeslots.index' , compact('time_slots'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create' , TimeSlot::class);

        return response()->view('cms.timeslots.create');

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
            'start_hour' => 'required|after:9:00',
            'end_hour' => 'required|after:start_hour ',
            'start_day' => 'required|date|after:yesterday ',
            'end_day' => 'required|date|after:yesterday ',
        ]);
        $this->authorize('create' , TimeSlot::class);

        if(! $validator->fails()){
            $time_slots = new TimeSlot();
            $time_slots->start_hour = $request->get('start_hour');
            $time_slots->end_hour = $request->get('end_hour');
            $time_slots->start_day = $request->get('start_day');
            $time_slots->end_day = $request->get('end_day');
            $isSaved = $time_slots->save();
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
        $time_slots = TimeSlot::findOrFail($id);
        $this->authorize('view' , TimeSlot::class);

        return response()->view('cms.timeslots.show' , compact('time_slots'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $time_slots = TimeSlot::findOrFail($id);
        $this->authorize('update' , TimeSlot::class);

        return response()->view('cms.timeslots.edit' , compact('time_slots'));
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
            'start_hour' => 'required|after:9:00',
            'end_hour' => 'required|after:start_hour ',
            'start_day' => 'required|date|after:yesterday ',
            'end_day' => 'required|date|after:yesterday ',
        ]);
        $this->authorize('update' , TimeSlot::class);

        if(! $validator->fails()){
            $time_slots = TimeSlot::findOrFail($id);
            $time_slots->start_hour = $request->get('start_hour');
            $time_slots->end_hour = $request->get('end_hour');
            $time_slots->start_day = $request->get('start_day');
            $time_slots->end_day = $request->get('end_day');
            $isSaved = $time_slots->save();
            return ['redirect' =>route('timeslots.index')];

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
        $this->authorize('delete' , TimeSlot::class);

        $time_slots = TimeSlot::destroy($id);

    }
}