<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class User37Controller extends Controller
{
    public function profile()
    {
        $agama = Http::get('http://localhost:8000/api/agama37')['data'];
        return view('user.profile', [
            'agamas' => $agama
        ]);
    }

    public function editimage(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->foto = $request->foto;

        if ($request->hasFile('foto')) {
            $foto_name = $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move('img/', $request->file('foto')->getClientOriginalName());
        }

        Http::put('http://localhost:8000/api/user37/update/image/' . $id, [
            'foto' => $foto_name
        ]);

        return redirect('/profile37');
    }

    public function editpassword(Request $request, $id)
    {
        Http::put('http://localhost:8000/api/user37/update/password/' . $id, [
            'password' => $request->password
        ]);

        return redirect('/profile37');
    }

    public function index()
    {
        $user = Http::get('http://localhost:8000/api/user37')['data'];
        return view('user.user', [
            'users' => $user,
            'no' => 1,
            'page' => "List user"
        ]);
    }

    public function show($id)
    {
        $user = Http::get('http://localhost:8000/api/user37/' . $id)['data'];

        return view('user.userdetail', [
            'user' => $user,
            'page' => "Detail user"
        ]);
    }

    public function destroy($id)
    {
        Http::delete('http://localhost:8000/api/user37/' . $id);
        return redirect('/user37');
    }

    public function update($id)
    {
        Http::put('http://localhost:8000/api/user37/' . $id);
        return redirect('/user37');
    }
}