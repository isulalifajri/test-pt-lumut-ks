<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $title = 'Halaman List Users';
        
        $users = User::orderBy('created_at', 'ASC')->paginate(20);
        return view('page.user.user', compact(
            'title', 'users'
        ));

    }

    public function create(){
        $title = 'Halaman Tambah Data';
        $role = ['admin','author'];
        return view('page.user.tambah-data',[
            'title' => $title,
            'role' => $role,
        ]);
    }

    public function edit($id){
        $data = User::findOrFail($id);
        $title = 'Halaman Edit Data';
        $role = ['admin','author'];
        return view('page.user.edit-data',[
            'title' => $title,
            'role' => $role,
            'data' => $data
        ]);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'username' => ['required', 'string', 'max:250'],
            'name' => ['required','max:250'],
            'role' => ['required', 'string', 'max:250'],
            'password' => ['required', 'confirmed'],
        ]);

        User::create($validatedData);

        return back()
            ->withSuccess('Pembuatan Akun Berhasil');
    }

    public function update(Request $request,$id){
        $validatedData = $request->validate([
            'username' => ['required', 'string', 'max:250'],
            'name' => ['required','max:250'],
            'role' => ['required', 'string', 'max:250'],
            'password' => ['required', 'confirmed'],
        ]);

        User::where('id', $id)
               ->update($validatedData);

        return back()
            ->withSuccess('Edit Akun Berhasil');
    }

    public function userDetail($id){
        $title = 'Halaman user Detail';
        $user = User::where('id', $id)->first();        
        return view('page.user.user_detail', compact(
            'title', 'user'
        ));
    }

    public function destroy(Request $request, $id){
        $user = User::findOrFail($id);
        $user->delete();

        return back()->with('success', 'Data berhasil dihapus');
    }
}
