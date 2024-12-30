<?php

namespace App\Http\Controllers;

use App\Models\SendMoneyToIraq;
use App\Http\Requests\StoreSendMoneyToIraqRequest;
use App\Http\Requests\UpdateSendMoneyToIraqRequest;
use App\Services\UploadFileService;

class SendMoneyToIraqController extends Controller
{
    public function __construct(private UploadFileService $uploadFileService) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $requests = SendMoneyToIraq::paginate(12);
        return view('admin.send-money-to-iraq', compact('requests'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSendMoneyToIraqRequest $request)
    {
        $request->validated();
        SendMoneyToIraq::create($request->safe()->except(['attachment', 'passport']) + [
            'attachment' => $this->uploadFileService->store($request->file('attachment'), 'attachments'),
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
    public function show(SendMoneyToIraq $send_money_to_iraq)
    {
        $request = $send_money_to_iraq;
        return view('admin.details.send-money-to-iraq', compact('request'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SendMoneyToIraq $send_money_to_iraq)
    {
        $send_money_to_iraq->delete();
        return back()->with('success', 'تم حذف الطلب بنجاح');
    }
}