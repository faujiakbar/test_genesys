<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\{Request, Response};
use App\Models\{
    Inventory
};

class InventoryController extends Controller {

    public function add(Request $r){
        $return = [
            "status" => true,
            "message" => "Berhasil",
            "data" => [],
            "code" => 200
        ];

        $inv = new Inventory;
        $inv->nama = $r->nama;
        $inv->harga = $r->harga;
        $inv->stok = $r->stok;

        if(!$inv->save()){
            $return['status'] = false;
            $return['message'] = "Terjadi kesalahan pada saat menyimpan";
        }

        return Response()->json($return, $return['code']);
    }

    public function edit(Request $r){
        $return = [
            "status" => true,
            "message" => "Berhasil",
            "data" => [],
            "code" => 200
        ];

        $inv = Inventory::find($r->inventory_id);
        if($inv){
            $inv->nama = $r->nama;
            $inv->harga = $r->harga;
            $inv->stok = $r->stok;

            if(!$inv->save()){
                $return['status'] = false;
                $return['message'] = "Terjadi kesalahan pada saat menyimpan";
            }
        } else {
            $return['status'] = false;
            $return['message'] = "Data tidak ditemukan";
        }


        return Response()->json($return, $return['code']);
    }

    public function del(Request $r){
        $return = [
            "status" => true,
            "message" => "Berhasil",
            "data" => [],
            "code" => 200
        ];

        $inv = Inventory::find($r->inventory_id);
        if($inv){
            $inv->delete();
        } else {
            $return['status'] = false;
            $return['message'] = "Data tidak ditemukan";
        }


        return Response()->json($return, $return['code']);
    }

    public function show(Request $r){
        $return = [
            "status" => true,
            "message" => "Berhasil",
            "data" => [],
            "code" => 200
        ];

        $inv = Inventory::all();
        $return['data'] = $inv;

        return Response()->json($return, $return['code']);
    }

    public function get(Request $r, $id){
        $return = [
            "status" => true,
            "message" => "Berhasil",
            "data" => [],
            "code" => 200
        ];

        $inv = Inventory::find($id);
        $return['data'] = $inv;

        return Response()->json($return, $return['code']);
    }
}
