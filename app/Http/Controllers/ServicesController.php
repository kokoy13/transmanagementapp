<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Models\Packet;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index()
    {
        $packets = Packet::all();
        $packetName = Packet::select('name')->distinct()->orderBy('id')->get();
        return view('pages.service.index')->with(compact('packets', 'packetName'));
    }

    public function create(){
        return view('pages.service.create-service');
    }

    public function store(ServiceRequest $request){
        $validate = $request->validated();
        $exist = Packet::where('name', $validate['name'])->where('bandwidth', $validate['bandwidth'])->exists();

        if($exist){
            return redirect()->route('service.create')->with('error', 'Error, Duplikat data');
        }

        $packet = Packet::create([
            'name' => $validate['name'],
            'bandwidth' => $validate['bandwidth'],
            'price' => $validate['price'],
            'desc' => $validate['desc'],
            'rasio' => $validate['rasio'],
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->route('services')->with('success','Service berhasil ditambahkan');
    }

    public function edit($id){
        $packet = Packet::find($id);
        return view('pages.service.edit-service')->with(compact('packet'));
    }

    public function update(ServiceRequest $request, $id){
        $packet = Packet::findOrFail($id);

        $exists = Packet::where('id', '!=', $id)
            ->where('bandwidth', $request->bandwidth)
            ->where('price', $request->price)
            ->where('desc', $request->desc)
            ->where('rasio', $request->rasio)
            ->exists();

        if ($exists) {
            return back()->with('error', 'Data sudah tersedia.');
        }

        $packet->update($request->only(['name', 'bandwidth', 'price', 'desc', 'rasio']));

        return redirect()->route('services')->with('success', 'Berhasil edit service');
    }

    public function delete($id){
        try {
            $packet = Packet::findOrFail($id);
            $packet->delete();

            return redirect()->route('services')->with('success', 'Service berhasil dihapus.');
        } catch (QueryException $e) {
            if ($e->getCode() == '23000') {
                return redirect()->route('services')->with('error', 'Tidak bisa menghapus service karena masih digunakan dalam order pelanggan.');
            }

            return redirect()->route('services')->with('error', 'Terjadi kesalahan saat menghapus service.');
        }
    }
}
