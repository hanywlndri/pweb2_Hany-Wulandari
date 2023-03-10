<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\remaja;
class RemajaController extends Controller
{
    public function index()
    {
        $remaja = remaja::all();
        return view('windmill-dashboard.public.index',compact(['remaja']));
    }

    public function store(Request $request)
    {
        remaja::create($request->except(['_token','submit']));
        return redirect('/remaja');
}
}