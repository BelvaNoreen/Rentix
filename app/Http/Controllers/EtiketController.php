<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\etiket;

class EtiketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etiket = Etiket::all();
        return $etiket;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $table = Etiket::create([
            "nama" => $request->nama,
            "kategori" => $request->kategori,
            "tanggal" => $request->tanggal,
            "harga" => $request->harga,
            "stok" => $request->stok
        ]);

        return response()->json([
            'success' => 201,
            'message' => 'e-tiket berhasil ditambahkan',
            'data' => $table
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $etiket = Etiket::find($id);
        if ($etiket) {
            return response()->json([
                'status' => 200,
                'data' => $etiket
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'ID ' . $id . ' tidak ditemukan'
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $etiket = Etiket::find($id);
        if($etiket){
            $etiket->nama = $request->nama ? $request->nama : $etiket->nama;
            $etiket->kategori = $request->kategori ? $request->kategori : $etiket->kategori;
            $etiket->tanggal = $request->tanggal ? $request->tanggal : $etiket->tanggal;
            $etiket->harga = $request->harga ? $request->harga : $etiket->harga;
            $etiket->stok = $request->stok ? $request->stok : $etiket->stok;
            $etiket->save();
            return response()->json([
                'status' => 200,
                'data' => $etiket
            ], 200);

        } else {
            return response()->json([
                'status'=>404,
                'message'=> $id . ' tidak ditemukan'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $etiket = Etiket::where('id',$id)->first();
        if ($etiket){
            $etiket->delete();
            return response()->json([
                'status' => 200,
                'data' => $etiket
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'id ' . $id . ' tidak ditemukan'
            ], 404);
        }
    }
}
