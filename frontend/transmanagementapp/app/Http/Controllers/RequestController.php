<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Packet;
use App\Models\Payment;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Request as BandwidthRequest;
use App\Services\RequestService;
use App\Http\Requests\StoreBandwidthRequest;

class RequestController extends Controller
{

    public function __construct(protected RequestService $requestService) {}

    public function index(){
        return view('front.request');
    }

    //Form Request Bandwidth dengan type regular
    public function requestBandwidth()
    {
        $packets = $this->requestService->getPackets();
        $payments = $this->requestService->getSuccessfulPaymentsForUser(Auth::id());
        return view('front.request-bandwidth', compact('payments', 'packets'));
    }

    //Store inputan form Request Bandwidth dengan type regular
    public function storeBandwidth(StoreBandwidthRequest $request)
    {
        $result = $this->requestService->storeBandwidthRequest($request->validated(), 'regular');

        if (!$result['status']) {
            return redirect()->route('requests')->with('error', $result['message']);
        }

        return redirect()->route('requests')->with('success', 'Berhasil request ' . $result['state'] . ' bandwidth, tunggu notifikasi dari admin untuk persetujuan');
    }

    public function requestBandwidthEvent()
    {
        $packets = $this->requestService->getPackets();
        $payments = $this->requestService->getEventEligiblePaymentsForUser(Auth::id());

        return view('front.request-event', compact('payments', 'packets'));
    }

    public function storeBandwidthEvent(StoreBandwidthRequest $request)
    {
        $result = $this->requestService->storeBandwidthRequest($request->validated(), 'event');

        if (!$result['status']) {
            return redirect()->route('requests')->with('error', $result['message']);
        }

        return redirect()->route('requests')->with('success', 'Berhasil request bandwidth event, tunggu notifikasi dari admin untuk persetujuan');
    }
}
