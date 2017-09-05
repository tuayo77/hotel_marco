<!DOCTYPE html>
<html>
<head>
    <title>facture</title>
</head>
<style type="text/css">
    h1{
        text-align: center;
        color: red;
        font-weight: bold;
        font-family: sans-serif;
    }
    p{
         text-align: center;
         font-weight: bold;
         font-family: sans-serif;
         color: #8e8e8e;
    }
    .right{
        padding-left:50%; 
    }
    img{
        width: 80px;
        height: 80px;
    }
</style>
<body>
<h1>
<img src="{{public_path()}}/pp1.jpg">
  MARCO PALACE  HOTEL 
</h1>
<p>
    chambre et suite VIP à prix modéré . snack-bar VIP - restaurant(cuisine africaine et européenne)- service traiteur- salle de reunion - salle de conference - salle de banquet de 500 places - piscine - parking interieur et exterieur -Autonomie d'electricité - internet <br>
    situé au carrefour Mairie Rurale Bafoussam - Cameroun <br>
</p>
    <p> B.P. 498 BAFOUSSAM &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Tél: 233.44.44.47 </p>
    <p>site web: www.makopalacehotel.com &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Tél: Email: makopalacehotel@yahoo.fr</p>

    <H2> NOTE D'HOTEL n<sup>0</sup>    </H2>
    <p class="right"> bafoussam le <?php date('Y-m-d/H:i:s'); ?></p>

 <div class="col-md-3 panel panel-warning">
            @forelse($reservations as $reservation)
             <div class="panel-heading">
               Nom et Prenom: {{ $reservation->nom_clt }} <br>
               Adresse : {{ $reservation->telephone }} <br>
               Chambre ou suite N<sup>0</sup> :  marco000{{ $reservation->id }}0 <br>
             nombre de jour{{ $reservation->nbre_jours }}0 <br>
               Prix:  Prix:  {{ $reservation->prix }} FCFA <br>
                <p> date d'entré:  {{ $reservation->date_debut }}</p>
                <p> date de liberation:  {{ $reservation->date_fin }}</p>
               Description: {{ $reservation->description }} <br>
              telephone: {{ $reservation->tel_ch }} <br>
            </div>
                
               @empty

               @endforelse
               
           {{--  <div class="panel-footer">
                <a href="{{route('facture.show',[ 'id_reser'=>$reservation->id,'download'=>'pdf' ])}}">telecharger la facture</a>
                
            </div>  --}}            
                signature client : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                 signature Caissièr(e)
            </div>  


</body>
</html>
