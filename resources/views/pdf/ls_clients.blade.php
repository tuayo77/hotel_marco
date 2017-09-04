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
  MARCO PALACE  HOTEL <br>
</h1>
<p> liste des clients </p>
    <p class="right"> bafoussam le <?php date('Y-m-d/H:i:s'); ?></p>

 <div class="col-md-3 panel panel-warning">
          @forelse($clients as $client)
                            <p> nom du client: {{ $client->nom_clt }}</p>
                            <p> telephne:  {{ $client->telephone }}</p>
                            <p> sexe: {{ $client->sexe }} </p>
                            <p> CNI {{ $client->cni }}</p>
                            <p> nationaliter {{ $client->nationalite }}</p>       
                            <hr>
                        @empty
                        vide 
                    @endforelse
               
            </div>  


</body>
</html>
