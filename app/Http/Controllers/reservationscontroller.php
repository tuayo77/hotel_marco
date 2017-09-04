<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\type_chambre;
use App\chambre;
use App\client;
use \DB;
use Carbon\Carbon;
use App\reservation;

class reservationscontroller extends Controller
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
        $clients = client::all();
        $chambres = DB::table('type_chambres')
            ->join('chambres', 'type_chambres.id', '=', 'chambres.id_type_ch')
            ->select('chambres.*', 'type_chambres.*')
            ->where('chambres.statut','=',0)
            ->get();
        $reservations = DB::table('reservations')
            ->join('chambres', 'reservations.id_ch', '=', 'chambres.id')
            ->join('clients', 'reservations.id_clt', '=', 'clients.id')
            ->join('type_chambres', 'chambres.id_type_ch', '=', 'type_chambres.id')
            ->select('reservations.*','chambres.*', 'type_chambres.*','clients.*')
            //->where('chambres.statut','=',1)
            ->orderBy('reservations.created_at','desc')
            ->get();
        return view('reservations.index',compact('type_chambres','chambres','clients','reservations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
               //  $oldDate =Carbon::now();
               //  $newDate = date('Y-m-d/H:i:s', strtotime("+ {$request->nbr} days"));
               // $newDate = $oldDate->addDays($request->nbr);
        
        $oldDate = Carbon::create();
         $newDate = $oldDate->addDays($request->nbre);
         $newDate->toDateTimeString();
         reservation::create([
            'mode_payement' => $request->mode_payement,
            'nbre_pers' => $request->nbre_pers,
            'date_debut' =>Carbon::create()->toDateTimeString(),
            'date_fin' => $newDate->toDateTimeString(),
            'id_clt' => $request->id_clt,
            'id_ch' => $request->id_ch,
        ]);
         DB::table('chambres')
                ->where('id', $request->id_ch)
                ->update(['statut' => 1]);
          $type_chambres = type_chambre::all();
        $clients = client::all();
        $chambres = DB::table('type_chambres')
            ->join('chambres', 'type_chambres.id', '=', 'chambres.id_type_ch')
            ->select('chambres.*', 'type_chambres.*')
            ->where('chambres.statut','=',0)
            ->get();
             $reservations = DB::table('reservations')
            ->join('chambres', 'reservations.id_ch', '=', 'chambres.id')
            ->join('clients', 'reservations.id_clt', '=', 'clients.id')
            ->join('type_chambres', 'chambres.id_type_ch', '=', 'type_chambres.id')
            ->select('reservations.*','chambres.*', 'type_chambres.*','clients.*')
            //->where('chambres.statut','=',1)
            ->get();
return view('reservations.index',compact('type_chambres','chambres','clients','reservations'));
       
        
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
        //
    }
}
