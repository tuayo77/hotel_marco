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
  MARCO PALACE  HOTEL  <br>
</h1>
<p>liste des reservation</p>
    <p class="right"> bafoussam le <?php date('Y-m-d/H:i:s'); ?></p>

 <div class="col-md-3 panel panel-warning">
           @forelse($reservations as $reservation)
                    <h4> Description: {{ $reservation->description }}</h4>
                            <p> Prix:  {{ $reservation->prix }} FCFA</p>
                            <p> code: marco000{{ $reservation->id }}0</p>
                            <p> telephone {{ $reservation->tel_ch }}</p>
                            <p> nom du client: {{ $reservation->nom_clt }}</p>
                            <p> telephne:  {{ $reservation->telephone }}</p>
                            <p> date d'entré:  {{ $reservation->date_debut }}</p>
                            <p> date de liberation:  {{ $reservation->date_fin }}</p>
                            <p> <a href=" {{action('facturecontroller@show',$reservation->id)}} " class="btn btn-primary"> télécharger la facture</a> </p>
               @empty

               @endforelse
               
            </div>  


</body>
</html>
