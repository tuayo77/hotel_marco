<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\type_chambre;
use App\chambre;
use App\client;
use \DB;
use Carbon\Carbon;
use App\occupation;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //verification de l'etat des chambre pour liberation si necessaire

        $occupations = occupation::all();

        foreach ($occupations as $occupation) {

            if ($occupation->date_fin <= date("Y-m-d H:i:s")) {
               DB::table('chambres')
                ->where('id', $occupation->id_ch)
                ->update(['statut' => 0]);
            }
        }
         // fin verification de l'etat des chambre pour liberation si necessaire

        $clients = client::all();
        $chambres_libre = chambre::where('statut', 0)->get();
        $chambres_prise = chambre::where('statut', 1)->get();
        $chambres_libre=$chambres_libre->count();
        $chambres_prise= $chambres_prise->count();
        $clients = $clients->count();
              
        return view('home', compact('clients','chambres_prise','chambres_libre'));
    }
}
