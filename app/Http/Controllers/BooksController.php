<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class BooksController extends Controller
{
    public function index()
    {
        $books = Book::all();
        $borrow = Borrow::all();
        return view('index', compact('books','borrow'));
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'nama_buku'=>'required|string',
            'penulis_buku'=>'required|string',
        ]);

        $create = Book::create($data);

        if (!$create)
        {
            App::abort(500, 'Error');
        }
        else{
            return redirect()->route('home');
        }
    }

    public function showpinjam($id)
    {
        //
        $data = Book::where('id', '=', $id)->first();
        // dd($data);
        return view('pinjam', compact('data'));
    }

    public function pinjam(Request $request)
    {
        // dd($request->nama_buku);
        $data = $request->validate([
            'nama_buku'=>'required|string',
            'nama_peminjam'=>'required|string',
            'no_hp'=>'required',
            'email'=>'required|string|email',
        ]);

        $create = Borrow::create($data);
        // dd($create);
        if (!$create)
        {
            App::abort(500, 'Error');
        }
        else{
            return redirect()->route('home');
        }
    }

    public function edit($id)
    {
        //
        $data = Book::where('id', '=', $id)->first();
        // dd($data);
        return view('edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
       $data = $request->validate([
            'nama_buku'=>'required|string',
            'penulis_buku'=>'required|string',
        ]);
        // dd($data);
        $data = Book::findOrFail($id);

        $data->update($request->all());
        return redirect()->route('home');
    }

    public function destroy($id)
    {
        $data = Book::findOrFail($id);
        $data->delete();

        return redirect()->back();
    }
}
