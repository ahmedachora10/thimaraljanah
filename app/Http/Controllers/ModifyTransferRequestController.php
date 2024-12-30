<?php

namespace App\Http\Controllers;

use App\Models\ModifyTransferRequest;
use App\Http\Requests\StoreModifyTransferRequestRequest;
use App\Http\Requests\UpdateModifyTransferRequestRequest;
use App\Services\UploadFileService;

class ModifyTransferRequestController extends Controller
{
    public function __construct(private UploadFileService $uploadFileService) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $requests = ModifyTransferRequest::paginate(12);
        return view('admin.modify-transfer', compact('requests'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreModifyTransferRequestRequest $request)
    {
        $request->validated();
        ModifyTransferRequest::create($request->safe()->except(['passport']) + [
            'passport' => $this->uploadFileService->store($request->file('passport'), 'passports'),
            'ip' => $request->ip()
        ]);

        return response()->json([
            'success' => true,
            'message' => 'تم اضافة الطلب بنجاح'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(ModifyTransferRequest $modify_transfer_request)
    {
        $request = $modify_transfer_request;
        return view('admin.details.modify-transfer', compact('request'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ModifyTransferRequest $modify_transfer_request)
    {
        $modify_transfer_request->delete();
        return back()->with('success', 'تم حذف الطلب بنجاح');
    }
}