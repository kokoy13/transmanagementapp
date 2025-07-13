<?php

namespace App\Services;

use App\Models\Packet;
use App\Models\Payment;
use App\Models\Request;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class RequestService
{
    //Mengambil semua jenis bandwidth secara unik
    public function getPackets()
    {
        return Packet::select('bandwidth')->distinct()->get();
    }

    //Dapatkan Payment seorang user yang berstatus success
    public function getSuccessfulPaymentsForUser($userId)
    {
        return Payment::whereHas('order', function ($query) use ($userId) {
            $query->where('user_id', $userId)->where('status', 'completed');
        })->where('payment_status', 'success')->get();
    }

    public function getEventEligiblePaymentsForUser($userId)
    {
        // Ambil order yang bukan paket Family, status success, dan eager load payment
        return Payment::with(['order.packet'])
            ->where('payment_status', 'success')
            ->whereHas('order', function ($query) use ($userId) {
                $query->where('user_id', $userId)
                    ->where('status', 'completed')
                    ->whereHas('packet', function ($q) {
                        $q->where('name', '!=', 'Family');
                    });
            })
            ->get();
    }

    public function storeBandwidthRequest(array $data, string $type): array
    {
        // Cek request sebelumnya
        $alreadyRequested = Request::where('payment_id', $data['current'])->exists();
        if ($alreadyRequested) {
            return [
                'status' => false,
                'message' => 'Request telah dilakukan sebelumnya, tunggu request dicancel admin sebelum melakukan request lagi',
            ];
        }

        $isEvent = $type === 'event';

        // Ambil detail payment → order → packet
        $payment = Payment::with('order.packet')->findOrFail($data['current']);
        $packetName = $payment->order->packet->name;

        // Tentukan state (upgrade / downgrade) hanya untuk regular
        $state = null;
        if (!$isEvent) {
            $state = $data['bandwidth'] > $data['bwFrom'] ? 'Upgrade' : 'Downgrade';
        }

        // Simpan request
        Request::create([
            'type' => $type,
            'payment_id' => $data['current'],
            'requested_bandwidth' => $data['bandwidth'],
            'note' => $data['note'] ?? null,
        ]);

        // Simpan notifikasi
        Notification::create([
            'user_id' => Auth::id(),
            'type' => 'request',
            'title' => $isEvent ? 'Request Event' : "Request {$state} Bandwidth",
            'message' => 'Customer dengan nama ' . Auth::user()->name .
                        ' melakukan request ' . ($isEvent ? 'event' : strtolower($state)) .
                        ' dari ' . $data['bandwidthAwal'] .
                        ' ke ' . $data['bandwidth'] .
                        ' dengan payment id ' . $data['current'],
        ]);

        return [
            'status' => true,
            'state' => $state,
        ];
    }

}
