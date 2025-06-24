<?php

namespace App\Http\Controllers;

use App\Models\Packet;
use Illuminate\Http\Request;


class PacketController extends Controller
{
    public function getContent(){
        $packets = Packet::all()->take(3);
        return $packets;
    }

    public function getPacket()
    {
        $packets = Packet::whereIn('name', ['Family', 'Office', 'Dedicated'])->orderBy('bandwidth')->get()->groupBy('name');

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

    public function searchPacket(Request $request){
        $keyword = $request->keyword;
        $packets = Packet::where('name', 'like', "%$keyword%")
                ->orWhereRaw("CAST(bandwidth AS CHAR) LIKE ?", ["%$keyword%"])
                ->orWhereRaw("CAST(price AS CHAR) LIKE ?", ["%$keyword%"])
                ->orderBy('bandwidth')
                ->get();
        $family = [];
        $office = [];
        $dedicated = [];
        foreach($packets as $packet){
            if($packet->name == "Family"){
                $family[] = $packet;
            }else if($packet->name == "Office"){
                $office[] = $packet;
            }else{
                $dedicated[] = $packet;
            }
        }

        $familyTitle = 'Family';
        $officeTitle = 'Office';
        $dedicatedTitle = 'Dedicated';

        return view('front.price-list', compact('keyword','family', 'office', 'dedicated', 'familyTitle', 'officeTitle', 'dedicatedTitle'));
    }
}
