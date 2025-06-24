<?php

namespace App\Services;
use App\Models\Zone;

class ZoneCheckerService
{
    public function check(string $kecamatanNama, string $kelurahanNama): array
    {
        $kecamatan = Zone::where('type', 'kecamatan')
            ->where('nama', $kecamatanNama)
            ->first();

        if (!$kecamatan) {
            return ['status' => false, 'message' => 'Zona belum tersedia'];
        }

        $kelurahan = Zone::where('type', 'kelurahan')
            ->where('nama', $kelurahanNama)
            ->where('parent_id', $kecamatan->id)
            ->first();

        if (!$kelurahan) {
            return ['status' => false, 'message' => 'Kelurahan kamu belum tersedia'];
        }

        return ['status' => true];
    }

    public function getKecamatanFromJson(): array
    {
        $path = public_path('js/map.json');

        if (!file_exists($path)) {
            throw new \RuntimeException('File zona tidak ditemukan.');
        }

        $json = file_get_contents($path);
        $zone = json_decode($json, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \RuntimeException('Format JSON tidak valid.');
        }

        return $zone['kecamatan'] ?? [];
    }
}
