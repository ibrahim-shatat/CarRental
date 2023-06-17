<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Renter;
use App\Models\Reservation;
use App\Models\TimeSlot;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservation::with('car','renter','time_slot')->orderBy('id' ,'desc')->paginate(10);
        $this->authorize('viewAny' , Reservation::class);

        return response()->view('cms.reservations.index' , compact('reservations'));
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
        $time_slots = TimeSlot::all();
        $this->authorize('create' , Reservation::class);

        return response()->view('cms.reservations.create' , compact('renters','cars','time_slots'));
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
            'name' => 'required|max:20|min:5|string',
            'reservation_date' => 'required|date|after:yesterday ',
            'reservation_time' => 'required|before:12:00' ,
            'car_id' => 'required',
            'renter_id' => 'required'
        ]);
        $this->authorize('create' , Reservation::class);

        if(! $validator->fails()){
            $reservations = new Reservation();
            $reservations->name = $request->get('name');
            $reservations->reservation_time = $request->get('reservation_time');
            $reservations->reservation_date = $request->get('reservation_date');
            $reservations->payment_method = $request->get('payment_method');
            $reservations->car_id = $request->get('car_id');
            $reservations->renter_id = $request->get('renter_id');
            $reservations->time_slot_id = $request->get('time_slot_id');
            $isSaved = $reservations->save();
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
        $reservations = Reservation::findOrFail($id);
        $cars = Car::all();
        $renters = Renter::all();
        $time_slots = TimeSlot::all();
        $this->authorize('view' , Reservation::class);

        return response()->view('cms.reservations.show' , compact('renters'  ,'cars','reservations','time_slots'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reservations = Reservation::findOrFail($id);
        $cars = Car::all();
        $renters = Renter::all();
        $time_slots = TimeSlot::all();
        $this->authorize('update' , Reservation::class);

        return response()->view('cms.reservations.edit' , compact('renters'  ,'cars','reservations','time_slots'));
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
            'name' => 'required|max:20|min:5|string',
            'reservation_date' => 'required|date|after:yesterday ',
            'reservation_time' => 'required|before:12:00' ,
            'car_id' => 'required',
            'renter_id' => 'required',
            'time_slot_id'=>'required'
        ]);
        $this->authorize('update' , Reservation::class);

        if(! $validator->fails()){
            $reservations = Reservation::findOrFail($id);
            $reservations->name = $request->get('name');
            $reservations->reservation_time = $request->get('reservation_time');
            $reservations->reservation_date = $request->get('reservation_date');
            $reservations->car_id = $request->get('car_id');
            $reservations->payment_method = $request->get('payment_method');
            $reservations->renter_id = $request->get('renter_id');
            $reservations->time_slot_id = $request->get('time_slot_id');
            $isSaved = $reservations->save();
            return ['redirect' =>route('reservations.index')];
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
        $this->authorize('delete' , Reservation::class);

        $reservations = Reservation::destroy($id);
    }
}