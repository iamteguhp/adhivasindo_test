<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use Http;

class ExternalUserController extends Controller
{
    public function getNama(Request $request)
    {
        try {
            // Make a GET request to the external API
            $response = Http::get('https://ogienurdiana.com/career/ecc694ce4e7f6e45a5a7912cde9fe131');

            // Pastikan API merespon dengan sukses
            if (!$response->successful()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Gagal mengambil data dari API eksternal.'
                ], 500);
            }

            // decode JSON
            $data = json_decode($response, true);

            // pecah baris
            $rows = explode("\n", $data['DATA']);

            // ambil baris pertama sebagai header
            $headerRow = array_shift($rows);

            // pecah header jadi array kolom
            $headers = explode('|', $headerRow);

            // rapikan (trim spasi)
            $headers = array_map('trim', $headers);

            // cari index header karena selalu berubah posisi
            $namaIndex = array_search('NAMA', $headers);
            $nimIndex = array_search('NIM', $headers);
            $ymdIndex = array_search('YMD', $headers);

            array_shift($rows);

            // ambil parameter nama dari query string, contoh: ?name=Emma
            $get_nama = $request->nama; 

            // cari berdasarkan keyword di kolom NAMA
            $result = array_filter($rows, function($row) use ($get_nama, $namaIndex) {
                $cols = explode('|', $row);
                $nama = $cols[$namaIndex] ?? ''; 
                return stripos($nama, $get_nama) !== false; // case-insensitive
            });

            // ubah hasil ke bentuk array asosiatif biar rapi
            $formatted = array_map(function($row) use ($namaIndex, $nimIndex, $ymdIndex) {
                $cols = explode('|', $row);
                return [
                    'nama' => $cols[$namaIndex] ?? null,
                    'nim'  => $cols[$nimIndex] ?? null,
                    'ymd'  => $cols[$ymdIndex] ?? null,
                ];
            }, $result);

            return $formatted;
            
        } catch (\Throwable $th) {
            return response()->json(['status' => 500, 'msg' => 'Server Error!', 'type' => 'error'], 500);
        }
    }

    public function getNIM(Request $request)
    {
        try {
            // Make a GET request to the external API
            $response = Http::get('https://ogienurdiana.com/career/ecc694ce4e7f6e45a5a7912cde9fe131');

            // Pastikan API merespon dengan sukses
            if (!$response->successful()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Gagal mengambil data dari API eksternal.'
                ], 500);
            }

            // decode JSON
            $data = json_decode($response, true);

            // pecah baris
            $rows = explode("\n", $data['DATA']);

            // ambil baris pertama sebagai header
            $headerRow = array_shift($rows);

            // pecah header jadi array kolom
            $headers = explode('|', $headerRow);

            // rapikan (trim spasi)
            $headers = array_map('trim', $headers);

            // cari index header karena selalu berubah posisi
            $namaIndex = array_search('NAMA', $headers);
            $nimIndex = array_search('NIM', $headers);
            $ymdIndex = array_search('YMD', $headers);

            array_shift($rows);

            // ambil parameter nim dari query string
            $get_nim = $request->nim; 

            // cari berdasarkan keyword di kolom NIM
            $result = array_filter($rows, function($row) use ($get_nim, $nimIndex) {
                $cols = explode('|', $row);
                $nim = $cols[$nimIndex] ?? ''; 
                return stripos($nim, $get_nim) !== false; // case-insensitive
            });

            // ubah hasil ke bentuk array asosiatif biar rapi
            $formatted = array_map(function($row) use ($namaIndex, $nimIndex, $ymdIndex) {
                $cols = explode('|', $row);
                return [
                    'nama' => $cols[$namaIndex] ?? null,
                    'nim'  => $cols[$nimIndex] ?? null,
                    'ymd'  => $cols[$ymdIndex] ?? null,
                ];
            }, $result);

            return $formatted;
            
        } catch (\Throwable $th) {
            return response()->json(['status' => 500, 'msg' => 'Server Error!', 'type' => 'error'], 500);
        }
    }


        public function getYMD(Request $request)
    {
        try {
            // Make a GET request to the external API
            $response = Http::get('https://ogienurdiana.com/career/ecc694ce4e7f6e45a5a7912cde9fe131');

            // Pastikan API merespon dengan sukses
            if (!$response->successful()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Gagal mengambil data dari API eksternal.'
                ], 500);
            }

            // decode JSON
            $data = json_decode($response, true);

            // pecah baris
            $rows = explode("\n", $data['DATA']);

            // ambil baris pertama sebagai header
            $headerRow = array_shift($rows);

            // pecah header jadi array kolom
            $headers = explode('|', $headerRow);

            // rapikan (trim spasi)
            $headers = array_map('trim', $headers);

            // cari index header karena selalu berubah posisi
            $namaIndex = array_search('NAMA', $headers);
            $nimIndex = array_search('NIM', $headers);
            $ymdIndex = array_search('YMD', $headers);

            array_shift($rows);

            // ambil parameter nim dari query string
            $get_ymd = $request->ymd; 

            // cari berdasarkan keyword di kolom NIM
            $result = array_filter($rows, function($row) use ($get_ymd, $ymdIndex) {
                $cols = explode('|', $row);
                $ymd = $cols[$ymdIndex] ?? ''; 
                return stripos($ymd, $get_ymd) !== false; // case-insensitive
            });

            // ubah hasil ke bentuk array asosiatif biar rapi
            $formatted = array_map(function($row) use ($namaIndex, $nimIndex, $ymdIndex) {
                $cols = explode('|', $row);
                return [
                    'nama' => $cols[$namaIndex] ?? null,
                    'nim'  => $cols[$nimIndex] ?? null,
                    'ymd'  => $cols[$ymdIndex] ?? null,
                ];
            }, $result);

            return $formatted;
            
        } catch (\Throwable $th) {
            return response()->json(['status' => 500, 'msg' => 'Server Error!', 'type' => 'error'], 500);
        }
    }
}
