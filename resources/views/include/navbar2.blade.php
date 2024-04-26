<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="index.html">
          <i class="ti-home menu-icon"></i>
          <span class="menu-title">Tableau de Bord</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
          <i class="ti-clipboard menu-icon"></i>
          <span class="menu-title">Création</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="form-elements">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"><a class="nav-link" href={{URL::to('/ajoutercategorie')}}>Ajouter Catégorie</a></li>
            <li class="nav-item"><a class="nav-link" href={{URL::to('/ajouterproduit')}}>Ajouter Produit</a></li>
            <li class="nav-item"><a class="nav-link" href={{URL::to('/ajouterslider')}}>Ajouter slider</a></li>
            {{-- <li class="nav-item"><a class="nav-link" href="wizard.html">Wizard</a></li> --}}
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
          <i class="ti-layout menu-icon"></i>
          <span class="menu-title">Affichage</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="tables">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="basic-table.html">Catégories</a></li>
            <li class="nav-item"> <a class="nav-link" href="data-table.html">Produits</a></li>
            <li class="nav-item"> <a class="nav-link" href="js-grid.html">Sliders</a></li>
            <li class="nav-item"> <a class="nav-link" href="sortable-table.html">Commandes</a></li>
          </ul>
        </div>
      </li>
    </ul>
  </nav>