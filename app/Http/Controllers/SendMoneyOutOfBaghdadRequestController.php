<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendMoneyOutRequest;
use App\Models\SendMoneyOutOfBaghdadRequest;
use App\Services\UploadFileService;
use Illuminate\Http\Request;

class SendMoneyOutOfBaghdadRequestController extends Controller
{
    public function __construct(private UploadFileService $uploadFileService) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $requests = SendMoneyOutOfBaghdadRequest::paginate(12);
        return view('admin.send-money-out', compact('requests'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SendMoneyOutRequest $request)
    {
        $request->validated();
        SendMoneyOutOfBaghdadRequest::create($request->safe()->except('attachment') + ['attachment' => $this->uploadFileService->store($request->file('attachment'), 'attachments')]);

        return response()->json([
            'success' => true,
            'message' => 'تم اضافة الطلب بنجاح'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(SendMoneyOutOfBaghdadRequest $send_money_out)
    {
        $request = $send_money_out;
        return view('admin.details.send-money-out', compact('request'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SendMoneyOutOfBaghdadRequest $send_money_out)
    {
        $send_money_out->delete();
        return back()->with('success', 'تم حذف الطلب بنجاح');
    }
}