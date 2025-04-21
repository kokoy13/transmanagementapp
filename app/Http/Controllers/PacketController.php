<?php

namespace App\Http\Controllers;

use App\Models\Packet;
use Illuminate\Http\Request;

class PacketController extends Controller
{
    public function getAll(){
        $packets = Packet::all();
        return $packets;
    }
}
