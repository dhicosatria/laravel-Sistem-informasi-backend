<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Agama37Controller extends Controller
{
    public function index()
    {
        $response = Http::get('http://localhost:8000/api/agama37/')->json();
        return view('agama.agama', [
            'response' => $response,
            'no' => 1,
            'page' => "Agama"
        ]);
    }

    public function store(Request $request)
    {

        Http::post('http://localhost:8000/api/agama37/', [
            'nama_agama' => $request->nama_agama,
        ]);

        return redirect('/agama37')->with('success', 'Create success');
    }

    public function update(Request $request, $id)
    {
        Http::put('http://localhost:8000/api/agama37/' . $id, [
            'nama_agama' => $request->nama_agama
        ]);

        return redirect('/agama37');
    }

    public function destroy($id)
    {
        Http::delete('http://localhost:8000/api/agama37/' . $id);

        return redirect('/agama37');
    }
}