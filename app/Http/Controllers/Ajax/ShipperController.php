<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Shipper\ShipperRepository;
use DB, Exception;

class ShipperController extends Controller
{
    protected $shipperRepository;

    public function __construct (ShipperRepository $shipperRepository)
    {
        $this->shipperRepository = $shipperRepository;
    }

    public function blockManyShipper(Request $request)
    {
        if (!$request->ajax()) {
            return response()->json([
                'success' => false,
            ]);
        }

        DB::beginTransaction();

        try {
            $shipperIds = $request->dataId;
            $this->shipperRepository->updateStatus($shipperIds, config('setting.shipper.status.block'));

            $result = true;
            $message = trans('lang.message.block_all_shipper_success');
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            report($e);
            $result = false;
            $message = trans('lang.message.block_all_shipper_failed');
            dd($e);
        }

        return response()->json([
            'success' => $result,
            'message' => $message,
        ]);
    }

    public function activeManyShipper(Request $request)
    {
        if (!$request->ajax()) {
            return response()->json([
                'success' => false,
            ]);
        }

        DB::beginTransaction();

        try {
            $this->shipperRepository->updateStatus($request->dataId, config('setting.shipper.status.offline'));

            $result = true;
            $message = trans('lang.message.active_all_shipper_success');
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            report($e);
            $result = false;
            $message = trans('lang.message.active_all_shipper_failed');
            dd($e);
        }

        return response()->json([
            'success' => $result,
            'message' => $message,
        ]);
    }
}
