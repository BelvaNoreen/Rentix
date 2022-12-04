<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemesanan = Pemesanan::all();
        return $pemesanan;
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
        $table = Pemesanan::create([
            "id_order" => $request->id_order,
            "date" => $request->date,
            "nama" => $request->nama,
            "jumlah_order" => $request->jumlah_order,
            "subtotal" => $request->subtotal
        ]);

        return response()->json([
            'success' => 201,
            'message' => 'pemesanan berhasil ditambahkan',
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
        $pemesanan = Pemesanan::find($id);
        if ($pemesanan) {
            return response()->json([
                'status' => 200,
                'data' => $pemesanan
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
        $pemesanan = Pemesanan::find($id);
        if($pemesanan){
            $pemesanan->id_order = $request->id_order ? $request->id_order : $pemesanan->id_order;
            $pemesanan->date = $request->date ? $request->date : $pemesanan->date;
            $pemesanan->nama = $request->nama ? $request->nama : $pemesanan->nama;
            $pemesanan->jumlah_order = $request->jumlah_order ? $request->jumlah_order : $pemesanan->jumlah_order;
            $pemesanan->subtotal = $request->subtotal ? $request->subtotal : $pemesanan->subtotal;
            $pemesanan->save();
            return response()->json([
                'status' => 200,
                'data' => $pemesanan
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
        $pemesanan = Pemesanan::where('id',$id)->first();
        if ($pemesanan){
            $pemesanan->delete();
            return response()->json([
                'status' => 200,
                'data' => $pemesanan
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'id ' . $id . ' tidak ditemukan'
            ], 404);
        }
    }
}
