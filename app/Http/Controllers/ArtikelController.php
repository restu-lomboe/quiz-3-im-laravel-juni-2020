<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use Illuminate\Support\Str;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikel = Artikel::get_all();
        // dd($artikel);
        return view ('artikel.index', compact('artikel'));
    }

    public function create()
    {
        return view ('artikel.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data_artikel = array(
            'judul' => $data['judul'],
            'isi' => $data['isi'],
            'tag' => json_encode(explode(',',$data['tag'])),
            'slug' => Str::slug($data['judul']),
            'created_at' => $data['created_at'],
            'updated_at' => $data['updated_at'],
        );
        // dd($data);
        $new_artikel = Artikel::save($data_artikel);

        return redirect()->route('artikel')->with('success', 'Artikel berhasil Ditambah');

    }

    public function detail($id)
    {
        $artikel = Artikel::get_all();
        $artikels = $artikel->where('id', $id)->first();
        // dd($artikels);
        $tag[] = json_decode($artikels->tag);
        foreach ($tag as $d => $v) {
            $tag1 = $v;
        }
        // dd($artikels);
        return view ('artikel.detail', compact('artikels', 'tag1'));
    }

    public function edit($id)
    {
        $artikel = Artikel::get_all();
        $artikels = $artikel->where('id', $id)->first();
        $tag[] = json_decode($artikels->tag);
        foreach ($tag as $d => $v) {
            $tag1 = $v;
        }
        return view ('artikel.update', compact('artikels', 'tag1'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        // dd($data);
        $data_artikel = array(
            'judul' => $data['judul'],
            'isi' => $data['isi'],
            'tag' => json_encode(explode(',',$data['tag'])),
            'slug' => Str::slug($data['judul']),
            'created_at' => $data['created_at'],
            'updated_at' => $data['updated_at'],
        );

        $update_artikel = Artikel::update($id, $data_artikel);
        return redirect()->route('artikel')->with('success', 'Artikel berhasil Diupdate');
    }

    public function delete($id)
    {
        $delete_artikel = Artikel::delete($id);
        return redirect()->route('artikel')->with('success', 'Artikel berhasil Dihapus');
    }
}
