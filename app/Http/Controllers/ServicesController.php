<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Models\Packet;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index()
    {
        $packets = Packet::all();
        $packetName = Packet::select('name')->distinct()->get();
        return view('pages.service.index')->with(compact('packets', 'packetName'));
    }

    public function create(){
        return view('pages.service.create-service');
    }

    public function store(ServiceRequest $request){

    }

    public function edit($id){
        $packet = Packet::find($id);
        return view('pages.service.edit-service')->with(compact('packet'));
    }

    public function update(ServiceRequest $request, $id){

    }

    public function delete($id){
        $packet = Packet::find($id);
        $packet->delete();

        return redirect()->route('services')->with('success','Berhasil menghapus paket');
    }
}
