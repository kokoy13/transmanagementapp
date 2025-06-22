<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Packet;
use Illuminate\Http\Request;
use App\Models\Request as BandwidthRequest;

class RequestController extends Controller
{
    public function index(){
        return view('front.request');
    }

    public function requestBandwidth(){
        $packets = Packet::select('bandwidth')->distinct()->get();
        $orders = Order::where('user_id', Auth::user()->id)
            ->where('status','success')
            ->get();
        $payments = [];
        foreach($orders as $order){
            $payments[] = Payment::where('order_id', $order->id)->where('payment_status','success')->get();
        }
        return view('front.request-bandwidth')->with(compact('payments', 'packets'));
    }

    public function requestBandwidthEvent(){
        $packets = Packet::select('bandwidth')->distinct()->get();
        $orders = Order::where('user_id', Auth::user()->id)
            ->where('status','success')
            ->get();
        $payments = [];
        foreach($orders as $order){
            if($order->packet->name != 'Family'){
                $payments[] = Payment::where('order_id', $order->id)->where('payment_status','success')->get();
            }
        }
        return view('front.request-event')->with(compact('payments','packets'));
    }

    public function storeBandwidth(Request $request){
        $requestExist = BandwidthRequest::where('payment_id', $request->input('current'))->get();
        if($requestExist->isNotEmpty()){
            return redirect()->route('requests')->with('error', 'Request telah dilakukan sebelumnya, tunggu request dicancel admin sebelum melakukan request lagi');
        }
        $state = null;
        if($request->bandwidth > $request->bwFrom){
            $state = 'Upgrade';
        }else{
            $state = 'Downgrade';
        }

        $bandwidthRequest = BandwidthRequest::create([
            'type' => 'regular',
            'payment_id' => $request->input('current'),
            'requested_bandwidth' => $request->input('bandwidth'),
            'note' => $request->input('note') ?? null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        if($bandwidthRequest){
            $notif = Notification::create([
                'user_id' => Auth::user()->id,
                'type' => 'request',
                'title' => 'Request '.$state.' Bandwidth',
                'Message' => 'User dengan nama '.Auth::user()->name. ' melakukan request '.$state.' bandwidth dari '. $request->input('bandwidthAwal').' ke '.$request->input('bandwidth').' dengan payment id'.$request->input('current'),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        return redirect()->route('requests')->with('success', 'berhasil request '.$state.' bandwidth, tunggu notifikasi dari admin untuk persetujuan');
    }

    public function storeBandwidthEvent(Request $request){
        $requestExist = BandwidthRequest::where('payment_id', $request->input('current'))->get();
        if($requestExist->isNotEmpty()){
            return redirect()->route('requests')->with('error', 'Request telah dilakukan sebelumnya, tunggu request dicancel admin sebelum melakukan request lagi');
        }

        $bandwidthRequest = BandwidthRequest::create([
            'type' => 'event',
            'payment_id' => $request->input('current'),
            'requested_bandwidth' => $request->input('bandwidth'),
            'note' => $request->input('note') ?? null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        if($bandwidthRequest){
            $notif = Notification::create([
                'user_id' => Auth::user()->id,
                'type' => 'request',
                'title' => 'Request Event',
                'Message' => 'Customer dengan nama '.Auth::user()->name. ' melakukan request event dari '. $request->input('bandwidthAwal').' ke '.$request->input('bandwidth').' dengan payment id'.$request->input('current'),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        return redirect()->route('requests')->with('success', 'berhasil request bandwidth event, tunggu notifikasi dari admin untuk persetujuan');
    }
}
