<?php

namespace App\Http\Controllers;

use App\Models\Contoh;
use Illuminate\Http\Request;

class ContohController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contohs = Contoh::paginate(10);
        return response()->json([
            'data' => $contohs
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contohs = Contoh::create([
            'nama' => $request->nama,
            'dob' => $request->dob,
            'email' => $request->email
        ]);
        return response()->json([
            'data' => $contohs
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contoh  $contoh
     * @return \Illuminate\Http\Response
     */
    public function show(Contoh $contoh)
    {
        return response()->json([
            'data' => $contoh
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contoh  $contoh
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contoh $contoh)
    {
        $contoh->nama = $request->nama;
        $contoh->dob = $request->dob;
        $contoh->email = $request->email;
        $contoh->save();

        return response()->json([
            'data' => $contoh
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contoh  $contoh
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contoh $contoh)
    {
        $contoh->delete();
        return response()->json([
            'message' => 'contoh berhasil dihapus'
        ], 204);
    }
}
