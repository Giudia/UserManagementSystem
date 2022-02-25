<?php 
  require_once 'include/head.php';
  require_once 'function.php';

?>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="../">Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Piante</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Inserimento
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="/view/elenco_genere.php">Genere</a></li>
            <li><a class="dropdown-item" href="/view/elenco_specie.php">Specie</a></li>
            <li><a class="dropdown-item" href="/view/elenco_sottospecie.php">Sottospecie</a></li>
            <li><a class="dropdown-item" href="/view/elenco_venditori.php">Venditori</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>