<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Store\StoreRepository;
use DB, Exception;

class StoreController extends Controller
{
    protected $storeRepository;

    public function __construct (StoreRepository $storeRepository)
    {
        $this->storeRepository = $storeRepository;
    }

    public function blockManyStore(Request $request)
    {
        if (!$request->ajax()) {
            return response()->json([
                'success' => false,
            ]);
        }

        DB::beginTransaction();

        try {
            $this->storeRepository->updateStatus($request->dataId, config('setting.store.status.block'));

            $result = true;
            $message = trans('lang.message.block_all_store_success');
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            report($e);
            $result = false;
            $message = trans('lang.message.block_all_store_failed');
            dd($e);
        }

        return response()->json([
            'success' => $result,
            'message' => $message,
        ]);
    }

    public function activeManyStore(Request $request)
    {
        if (!$request->ajax()) {
            return response()->json([
                'success' => false,
            ]);
        }

        DB::beginTransaction();

        try {
            $this->storeRepository->updateStatus($request->dataId, config('setting.store.status.accepted'));

            $result = true;
            $message = trans('lang.message.active_all_store_success');
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            report($e);
            $result = false;
            $message = trans('lang.message.active_all_store_failed');
            dd($e);
        }

        return response()->json([
            'success' => $result,
            'message' => $message,
        ]);
    }
}
