<?php

namespace App\Http\Controllers;

use App\Services\PacketService;
use App\Models\Packet;
use Illuminate\Http\Request;

class PacketController extends Controller
{
    protected $packetService;

    public function __construct(PacketService $packetService)
    {
        $this->packetService = $packetService;
    }

    public function getPacket()
    {
        $grouped = $this->packetService->getGroupedPacketsByName();

        $family = $grouped['Family'];
        $office = $grouped['Office'];
        $dedicated = $grouped['Dedicated'];

        $familyTitle = $family->first()?->name ?? 'Family';
        $officeTitle = $office->first()?->name ?? 'Office';
        $dedicatedTitle = $dedicated->first()?->name ?? 'Dedicated';

        return view('front.price-list', compact(
            'family',
            'office',
            'dedicated',
            'familyTitle',
            'officeTitle',
            'dedicatedTitle'
        ));
    }

    public function getPacketId($id)
    {
        $details = $this->packetService->getPacketById($id);
        return view('front.details', compact('details'));
    }

    public function searchPacket(Request $request)
    {
        $keyword = $request->keyword;
        $grouped = $this->packetService->searchGroupedPackets($keyword);

        $categorized = [
            'Family' => [],
            'Office' => [],
            'Dedicated' => []
        ];

        foreach ($grouped as $packet) {
            $name = $packet->name;
            if (isset($categorized[$name])) {
                $categorized[$name][] = $packet;
            } else {
                $categorized['Dedicated'][] = $packet;
            }
        }

        $family = $categorized['Family'];
        $office = $categorized['Office'];
        $dedicated = $categorized['Dedicated'];

        $familyTitle = 'Family';
        $officeTitle = 'Office';
        $dedicatedTitle = 'Dedicated';


        return view('front.price-list', compact('keyword','family', 'office', 'dedicated', 'familyTitle', 'officeTitle', 'dedicatedTitle'));
    }
}
