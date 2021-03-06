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



class pdfcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = client::paginate(10);
        $occupations = occupation::paginate(10);
        return view('pdf.index',compact('clients','occupations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($var)
    {
        dd($var);
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

        if ($id =='clients' ) {
             $clients = client::all();
              $pdf = PDF::loadView('pdf.ls_clients',compact('clients'));
            return $pdf->download('liste_des_clients.pdf');
        } else 
        if($id =='occupations' ){
           $occupations = DB::table('occupations')
            ->join('chambres', 'occupations.id_ch', '=', 'chambres.id')
            ->join('clients', 'occupations.id_clt', '=', 'clients.id')
            ->join('type_chambres', 'chambres.id_type_ch', '=', 'type_chambres.id')
            ->select('occupations.*','chambres.*', 'type_chambres.*','clients.*')
            ->get();
            $pdf = PDF::loadView('pdf.ls_occupations',compact('occupations'));
            return $pdf->download('liste_des_occupation.pdf');
        }
        
       
       
        
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
