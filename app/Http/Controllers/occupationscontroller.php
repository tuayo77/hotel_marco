<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\type_chambre;
use App\chambre;
use App\client;
use \DB;
use Carbon\Carbon;
use App\occupation;

class occupationscontroller extends Controller
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
        $occupations = DB::table('occupations')
            ->join('chambres', 'occupations.id_ch', '=', 'chambres.id')
            ->join('clients', 'occupations.id_clt', '=', 'clients.id')
            ->join('type_chambres', 'chambres.id_type_ch', '=', 'type_chambres.id')
            ->select('occupations.*','chambres.*', 'type_chambres.*','clients.*')
            //->where('chambres.statut','=',1)
            ->orderBy('occupations.created_at','Desc')
            ->get();
        return view('occupations.index',compact('type_chambres','chambres','clients','occupations'));
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
         $chambres = DB::table('type_chambres')
            ->join('chambres', 'type_chambres.id', '=', 'chambres.id_type_ch')
            ->select('chambres.*', 'type_chambres.*')
            ->where('chambres.id','=',$request->id_ch)
            ->get();
            foreach ($chambres as $chambre) {
              $prix = $chambre->prix;
            }

        $prix = $prix * $request->nbre;
        $oldDate = Carbon::create();
         $newDate = $oldDate->addDays($request->nbre);
         $newDate->toDateTimeString();
         occupation::create([
            'mode_payement' => $request->mode_payement,
            'nbre_pers' => $request->nbre_pers,
            'nbre_jours' => $request->nbre,
            'prix' => $prix,
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
             $occupations = DB::table('occupations')
            ->join('chambres', 'occupations.id_ch', '=', 'chambres.id')
            ->join('clients', 'occupations.id_clt', '=', 'clients.id')
            ->join('type_chambres', 'chambres.id_type_ch', '=', 'type_chambres.id')
            ->select('occupations.*','chambres.*', 'type_chambres.*','clients.*')
            //->where('chambres.statut','=',1)
            ->get();
return view('occupations.index',compact('type_chambres','chambres','clients','occupations'));
       
        
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
        return view('occupations.edit_facture',compact('occupations'));
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
