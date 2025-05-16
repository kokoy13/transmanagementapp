<?php

namespace App\Http\Controllers;

use App\Models\Packet;

class PacketController extends Controller
{
    public function getContent(){
        $packets = Packet::all()->take(6);
        return $packets;
    }

    public function getPacket()
    {
        $packets = Packet::whereIn('name', ['Family', 'Office', 'Dedicated'])->get()->groupBy('name');

        $family = $packets->get('Family', collect());
        $office = $packets->get('Office', collect());
        $dedicated = $packets->get('Dedicated', collect());

        $familyTitle = $family->first()->name;
        $officeTitle = $office->first()->name;
        $dedicatedTitle = $dedicated->first()->name;

        return view('front.price-list', compact('family', 'office', 'dedicated', 'familyTitle', 'officeTitle', 'dedicatedTitle'));
    }


    public function getPacketId($id){
        $details = Packet::find($id);
        return view('front.details')->with(compact('details'));
    }
}
