<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Shipper\ShipperRepository;
use App\Repositories\User\UserRepository;
use Exception, DB, Mail;
use App\Mail\RegisterShipperMail;
use App\Http\Requests\ShipperRequest;

class ShipperController extends Controller
{
    protected $shipperRepository;
    protected $userRepository;

    public function __construct (
        ShipperRepository $shipperRepository,
        UserRepository $userRepository
    ) {
        $this->shipperRepository = $shipperRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shippers = $this->shipperRepository->getAllShippers();

        return view('shippers.index', compact('shippers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shippers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ShipperRequest $request)
    {
        DB::beginTransaction();

        try {
            $userData = $request->only(
                'name',
                'email',
                'address',
                'phone'
            );

            $userData['role_id'] = config('setting.role.shipper');
            $userData['password_digest'] = str_random(8);
            $user = $this->userRepository->createUser($userData);

            $shipperData = [
                'user_id' => $user->id,
                'identity_number' => $request->identity_number,
                'status' => config('setting.shipper.status.offline'),
            ];

            $this->shipperRepository->createShipper($shipperData);
            Mail::to($user->email)->send(new RegisterShipperMail($user->email, $userData['password_digest']));
            DB::commit();

            return redirect()->route('shipper.index')->with('status', trans('lang.message.register_shipper_success'));
        } catch (Exception $e) {
            report($e);
            DB::rollback();

            return redirect()->back()->with('error', trans('lang.message.register_shipper_error'));
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
        try {
            $shipper = $this->shipperRepository->getShipperDetail($id);
            
            return view('shippers.edit', compact('shipper'));
        } catch (Exception $e) {
            report($e);
            abort(404);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ShipperRequest $request, $id)
    {
        DB::beginTransaction();

        try {
            $userData = $request->only(
                'name',
                'email',
                'address',
                'phone'
            );

            $userData['password_digest'] = str_random(8);

            $shipperData = [
                'identity_number' => $request->identity_number,
                'status' => config('setting.shipper.status.offline'),
            ];

            $this->shipperRepository->updateShipper($id, $shipperData, $userData);

            Mail::to($userData['email'])->send(new RegisterShipperMail($userData['email'], $userData['password_digest']));
            DB::commit();

            return redirect()->route('shipper.show', $id)->with('status', trans('lang.message.update_shipper_success'));
        } catch (Exception $e) {
            report($e);
            DB::rollback();

            return redirect()->back()->with('error', trans('lang.message.update_shipper_error'));
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
        //
    }
}
