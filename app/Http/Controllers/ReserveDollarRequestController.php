<?php

namespace App\Http\Controllers;

use App\Models\ReserveDollarRequest;
use App\Http\Requests\StoreReserveDollarRequestRequest;
use App\Http\Requests\UpdateReserveDollarRequestRequest;
use App\Services\UploadFileService;

class ReserveDollarRequestController extends Controller
{
    public function __construct(private UploadFileService $uploadFileService) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $requests = ReserveDollarRequest::paginate(12);
        return view('admin.reserve-dollar', compact('requests'));
    }


    public function store(StoreReserveDollarRequestRequest $request)
    {
        $request->validated();
        ReserveDollarRequest::create($request->safe()->except(['ticket_photo', 'card_front_photo', 'residence_card_front_photo', 'passport_photo']) + [
            'ticket_photo' => $this->uploadFileService->store($request->file('ticket_photo'), 'tickets'),
            'card_front_photo' => $this->uploadFileService->store($request->file('card_front_photo'), 'cards'),
            'residence_card_front_photo' => $this->uploadFileService->store($request->file('residence_card_front_photo'), 'residence_cards'),
            'passport_photo' => $this->uploadFileService->store($request->file('passport_photo'), 'passports'),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'تم اضافة الطلب بنجاح'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(ReserveDollarRequest $reserve_dollar_request)
    {
        $request = $reserve_dollar_request;
        return view('admin.details.reserve-dollar', compact('request'));
    }

    public function destroy(ReserveDollarRequest $reserve_dollar_request)
    {
        $reserve_dollar_request->delete();
        return back()->with('success', 'تم حذف الطلب بنجاح');
    }
}