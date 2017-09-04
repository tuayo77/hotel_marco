<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\client;

class clientscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       dd('client list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = client::all();
      return view('clients.index',compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        client::create([
            'nom_clt' => $request->nom_clt,
            'date_nais_clt' => $request->date_nais_clt,
            'lieux' => $request->lieux,
            'nationalite' => $request->nationalite,
            'sexe' => $request->sexe,
            'pays_resi' => $request->pays_resi,
            'telephone' => $request->telephone,
            'profession' => $request->profession,
            'from' => $request->from,
            'to' => $request->to,
            'cni' => $request->cni,
            'deliver' => $request->deliver,
            'transport' => $request->transport,
        ]);
        $clients = client::all();
      return view('clients.index',compact('clients'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         dd('show one client ');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         dd('show view edit a client');
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
         dd('update client info');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        client::destroy($id);
       return redirect()->route('type_chambres.create');
    }
}
