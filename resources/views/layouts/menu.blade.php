<div class="menu">
    <ul class="list-group">
        <li class="list-group-item">
            <a href="{{ url('/') }}" class="menu-home">
                <i class="fa fa-home"></i>
              Home
            </a>
        </li>
        <li class="list-group-item">
            <a href="{{ route('clients.create') }}" class="menu-home">
                <i class="fa fa-user"></i>
               enregister un client
            </a>
        </li>
        <li class="list-group-item">
            <a href="{{ route('reservations.create') }}" class="menu-nearby">
                <i class="fa fa-bed"></i>
              faire une reservation 
            </a>
        </li>
       
        <li class="list-group-item">
            <a href="{{ url('/') }}" class="menu-dm">
                <i class="fa fa-commenting"></i>
              enregistrer une vente 
            </a>
        </li>
        <li class="list-group-item">
            <a href="{{ route('type_chambres.create') }}" class="menu-nearby">
                <i class="fa fa-bed"></i>
            categories  chambres
            </a>
        </li>
        <li class="list-group-item">
            <a href="{{ route('chambres.create') }}" class="menu-dm">
                <i class="fa fa-bed"></i>
              chambres
            </a>
        </li>
         <li class="list-group-item">
            <a href="{{ url('/') }}" class="menu-home">
                <i class="fa fa-address-card-o"></i>
               sortir une facture
            </a>
        </li>
    </ul>
</div>