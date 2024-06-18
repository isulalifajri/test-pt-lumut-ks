<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(){
        $title = 'Halaman POST';
        
        $posts = Post::orderBy('created_at', 'DESC')->paginate(20);
        return view('page.post.post', compact(
            'title', 'posts'
        ));

    }

    public function create(){
        $title = 'Halaman Tambah Data';
        return view('page.post.tambah-data',[
            'title' => $title,
        ]);
    }

    public function edit($id){
        $data = Post::findOrFail($id);
        $title = 'Halaman Edit Data';
        return view('page.post.edit-data',[
            'title' => $title,
            'data' => $data
        ]);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'title' => ['required', 'string', 'max:250'],
            'content' => ['required'],
        ]);

        $validatedData['user_id'] = Auth::user()->id;

        Post::create($validatedData);

        return back()
            ->withSuccess('Pembuatan Post Berhasil');
    }

    public function destroy($id){
        $post = Post::findOrFail($id);
        $post->delete();

        return back()->with('success', 'Data berhasil dihapus');
    }
}
