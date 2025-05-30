<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Models\Packet;
use App\Services\MikrotikApiService;
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
        //Validate Request
        $validate = $request->validated();

        //Handle if packet exist
        $exist = Packet::where('name', $validate['name'])->where('bandwidth', $validate['bandwidth'])->exists();
        if($exist){
            return redirect()->route('service.create')->with('error', 'Error, Duplikat data');
        }

        //Create Profile On Winbox
        $api = new MikrotikApiService();
        $name = $validate['name']. '-'.$validate['bandwidth'].'M';
        $limit = $this->getLimit($validate['name'], $validate['bandwidth']);
        $profile = $api->createProfile($name, $limit);

        //Create Packet
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

    public function getLimit($name, $bandwidth)
    {
        $limits = [
            'Family' => [
                10  => '1280k/10240k',
                20  => '4560k/22480k',
                30  => '3840k/30720k',
                50  => '6400k/51200k',
                100 => '12800k/102400k',
                200 => '22800k/202400k',
            ],
            'Internet Kerja' => [
                30 => '32240k/32240k',
            ],
            'Office' => [
                10  => '2810k/11240k',
                20  => '5560k/22240k',
                30  => '8120k/32240k',
                50  => '13240k/52240k',
                60  => '30000k/60000k',
                100 => '202400k/202400k',
            ],
        ];

        if (!isset($limits[$name])) {
            return null;
        }

        if (isset($limits[$name][$bandwidth])) {
            return $limits[$name][$bandwidth];
        }

        $tx = $bandwidth * 1024;

        switch ($name) {
            case 'Family':
                $rx = $tx / 8;
                break;
            case 'Internet Kerja':
                $rx = $tx;
                break;
            case 'Office':
                $rx = $tx / 4;
                break;
            default:
                return null;
        }

        return (int)$rx . 'k/' . (int)$tx . 'k';
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
