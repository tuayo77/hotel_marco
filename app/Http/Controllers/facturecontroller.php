<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\type_chambre;
use App\chambre;
use App\client;
use \DB;
use Carbon\Carbon;
use App\occupation;
use PDF;

class facturecontroller extends Controller
{
    
    public function fac_reserv($id)
    {

         $occupations = DB::table('occupations')
            ->join('chambres', 'occupations.id_ch', '=', 'chambres.id')
            ->join('clients', 'occupations.id_clt', '=', 'clients.id')
            ->join('type_chambres', 'chambres.id_type_ch', '=', 'type_chambres.id')
            ->select('occupations.*','chambres.*', 'type_chambres.*','clients.*')
            ->where('occupations.id','=',$id)
            ->get();
        return view('occupations.facture');
    }
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

          $occupations = DB::table('occupations')
            ->join('chambres', 'occupations.id_ch', '=', 'chambres.id')
            ->join('clients', 'occupations.id_clt', '=', 'clients.id')
            ->join('type_chambres', 'chambres.id_type_ch', '=', 'type_chambres.id')
            ->select('occupations.*','chambres.*', 'type_chambres.*','clients.*')
            ->where('occupations.id','=',$id)
            ->get();
            $pdf = PDF::loadView('occupations.facture',compact('occupations'));

            return $pdf->download('facture.pdf');
        // return view('occupations.facture',compact('occupations'));
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
        //
    }
}
