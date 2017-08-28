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
            <a href="{{ url('/') }}" class="menu-nearby">
                <i class="fa fa-bed"></i>
                reserver une chambre
            </a>
        </li>
        <li class="list-group-item">
            <a href="{{ url('/') }}" class="menu-groups">
                <i class="fa fa-users"></i>
                reserver une sale
            </a>
        </li>
        <li class="list-group-item">
            <a href="{{ url('/') }}" class="menu-dm">
                <i class="fa fa-commenting"></i>
              enregistrer une vente 
            </a>
        </li>
        <li class="list-group-item">
            <a href="{{ url('/') }}" class="menu-dm">
                <i class="fa fa-address-card-o"></i>
               sortir une facture
            </a>
        </li>
    </ul>
</div>