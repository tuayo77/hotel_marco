<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\chambre;
use App\type_chambre;
use \DB;
class chambrecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type_chambres = type_chambre::all();
        $chambres = DB::table('type_chambres')
            ->join('chambres', 'type_chambres.id', '=', 'chambres.id_type_ch')
            ->select('chambres.*', 'type_chambres.*')
            ->get();
        return view('chambres.index',compact('type_chambres','chambres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        chambre::create([
            'tel_ch' => $request->tel_ch,
            'description' => $request->description,
            'id_type_ch' => $request->id_type_ch,
            'statut' => 0,
        ]);

        $chambres = chambre::all();
        $type_chambres = type_chambre::all();
        return view('chambres.index',compact('type_chambres','chambres'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        chambre::destroy($id);
       return redirect()->route('chambres.create');
    }
}
