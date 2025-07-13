<?php

namespace App\Services;

use App\Models\Packet;

class PacketService
{
    //Mengambil 3 paket best seller yang ditampilkan di Landing Page
    public function getTopPackets(int $limit = 3)
    {
        return Packet::limit($limit)->get();
    }

    //Mengambil Paket per grup sesuai name untuk ditampilkan di pricelist
    public function getGroupedPacketsByName(array $names = ['Family', 'Office', 'Dedicated'])
    {
        $packets = Packet::whereIn('name', $names)
            ->orderBy('bandwidth')
            ->get()
            ->groupBy('name');

        return [
            'Family' => $packets->get('Family', collect()),
            'Office' => $packets->get('Office', collect()),
            'Dedicated' => $packets->get('Dedicated', collect()),
        ];
    }

    public function getPacketById($id)
    {
        return Packet::findOrFail($id);
    }

    public function searchGroupedPackets(string $keyword)
    {
        $packets = Packet::where('name', 'like', "%$keyword%")
            ->orWhereRaw('CAST(bandwidth AS CHAR) LIKE ?', ["%$keyword%"])
            ->orWhereRaw('CAST(price AS CHAR) LIKE ?', ["%$keyword%"])
            ->orderBy('bandwidth')
            ->get();

        return $packets;
    }
}
