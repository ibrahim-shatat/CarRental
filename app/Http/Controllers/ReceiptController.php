<?php

namespace App\Http\Controllers;

use App\Models\Buyer;
use App\Models\Car;
use App\Models\Receipt;
use Illuminate\Http\Request;

class ReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $receipts = Receipt::with('car','buyer')->orderBy('id' ,'desc')->paginate(10);
        $this->authorize('viewAny' , Receipt::class);

        return response()->view('cms.receipts.index' , compact('receipts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buyers = Buyer::all();
        $cars = Car::all();
        $this->authorize('create' , Receipt::class);

        return response()->view('cms.receipts.create' , compact('buyers','cars'));
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
            'receipt_date' => 'required|date|after:yesterday ',
            'receipt_time' => 'required' ,
            'car_id' => 'required',
            'buyer_id' => 'required'
        ]);
        $this->authorize('create' , Receipt::class);

        if(! $validator->fails()){
            $receipts = new Receipt();
            $receipts->name = $request->get('name');
            $receipts->receipt_date = $request->get('receipt_date');
            $receipts->receipt_time = $request->get('receipt_time');
            $receipts->car_id = $request->get('car_id');
            $receipts->buyer_id = $request->get('buyer_id');
            $receipts->payment_method = $request->get('payment_method');
            $isSaved = $receipts->save();
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
        $receipts = Receipt::findOrFail($id);
        $cars = Car::all();
        $buyers = Buyer::all();
        $this->authorize('view' , Receipt::class);

        return response()->view('cms.receipts.show' , compact('buyers'  ,'cars','receipts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $receipts = Receipt::findOrFail($id);
        $cars = Car::all();
        $buyers = Buyer::all();
        $this->authorize('update' , Receipt::class);

        return response()->view('cms.receipts.edit' , compact('buyers'  ,'cars','receipts'));
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
            'receipt_date' => 'required|date|after:yesterday ',
            'receipt_time' => 'required' ,
            'car_id' => 'required',
            'buyer_id' => 'required'
        ]);
        $this->authorize('update' , Receipt::class);

        if(! $validator->fails()){
            $receipts = Receipt::findOrFail($id);
            $receipts->name = $request->get('name');
            $receipts->receipt_date = $request->get('receipt_date');
            $receipts->receipt_time = $request->get('receipt_time');
            $receipts->car_id = $request->get('car_id');
            $receipts->buyer_id = $request->get('buyer_id');
            $receipts->payment_method = $request->get('payment_method');
            $isSaved = $receipts->save();
            return ['redirect' =>route('receipts.index')];

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
        $this->authorize('delete' , Receipt::class);

        $receipts = Receipt::destroy($id);

    }
}