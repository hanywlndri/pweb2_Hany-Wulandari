<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\remaja;

class penggunaController extends Controller
{
    public function index()
    {
        $remaja = remaja::all();
        return view('windmill-dashboard.public.remaja',compact(['remaja']));
    }

    public function store(Request $request)
    {
        remaja::create($request->except(['_token','submit']));
        return redirect('/remaja');
    }
    public function tambahmasuk()
    {
        // $tabel_pemasukan = tabel_pemasukan::all();
        // return view('sneat.html.index',compact('tabel_pemasukan'));
        return view('windmill-dashboard.public.tambahremaja');
    }
    public function insertremaja(Request $request)
    {
        $data = $request->all();
        $datarem = new remaja();
        $datarem->nik = $data['nik'];
        $datarem->nama = $data['nama'];
        $datarem->alamat = $data['alamat'];
        $datarem->ttl = $data['ttl'];
        $datarem->save();
        return redirect()->route('insertremaja');

 
    
    }
    public function deletedata($nik)
    {
        $remaja = remaja::find($nik);
        $remaja->delete();
        return redirect('/remaja');
    }
public function delete(string $id)
    {
        remaja::where('id',$id)->delete();
        return redirect()->to('remaja')->with('success');
    }
    }

