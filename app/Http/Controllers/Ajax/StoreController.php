<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Store\StoreRepository;
use App\Repositories\User\UserRepository;
use DB, Exception;

class StoreController extends Controller
{
    protected $storeRepository;
    protected $userRepository;

    public function __construct (
        StoreRepository $storeRepository,
        UserRepository $userRepository
    ) {
        $this->storeRepository = $storeRepository;
        $this->userRepository = $userRepository;
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
            $storeIds = $request->dataId;

            $ownerIds = $this->storeRepository->updateStatus($storeIds, config('setting.store.status.block'));

            $this->userRepository->updateOwner($ownerIds);

            $result = true;
            $message = trans('lang.message.block_all_store_success');
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            report($e);
            $result = false;
            $message = trans('lang.message.block_all_store_failed');
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
            $storeIds = $request->dataId;

            $ownerIds = $this->storeRepository->updateStatus($request->dataId, config('setting.store.status.accepted'));

            $this->userRepository->updateOwner($ownerIds);

            $result = true;
            $message = trans('lang.message.active_all_store_success');
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            report($e);
            $result = false;
            $message = trans('lang.message.active_all_store_failed');
        }

        return response()->json([
            'success' => $result,
            'message' => $message,
        ]);
    }
}
