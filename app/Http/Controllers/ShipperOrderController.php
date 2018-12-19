<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ShipperOrder\ShipperOrderRepository;

class ShipperOrderController extends Controller
{
    protected $shipperOrderRepository;

    public function __construct(ShipperOrderRepository $shipperOrderRepository)
    {
        $this->shipperOrderRepository = $shipperOrderRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shipperOrders = $this->shipperOrderRepository->getAllShipperOrder(10);

        return view('shipper_orders.index', compact('shipperOrders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shipperOrders = $this->shipperOrderRepository->getShipperOrder($id, 10);

        return view('shipper_orders.index', compact('shipperOrders'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
