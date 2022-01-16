
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <?php
          $classActive = (stripos($url,'index') && empty($_GET['action']));
          $class = $classActive? 'active':'';
        ?>
        <a class="nav-link <?= $class ?>"href="index.php"><i class="fas fa-users"></i> Users</a>

        <?php
          $classActive = (stripos($url,'index') && !empty($_GET['action']) && $_GET['action'] === 'insert');
          $class = $classActive? 'active':'';
         ?>
        <a class="nav-link <?= $class ?>" href="index.php?action=insert"><i class="fas fa-user-plus"></i> Add user</a>

        <form class="form-inline mt-2 mt-md-0 d-flex" action="<?=$url?>" name="formSearch" id="formSearch" method="get" >

          <input type="hidden" name="page" value="<?=$page?>">

          <div class="form-group mx-1">
            <select id="orderby" class="form-control" name="orderby" onchange="document.forms.formSearch.submit()">
              <option value="">Ordina</option>
              <?php foreach ($orderByColumns as $value): ?>
                <option <?= ($orderby==$value)?'selected':'' ?> value="<?=$value?>"><?=$value?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="form-group mx-1">
            <select id="orderDir" class="form-control" name="orderDir" onchange="document.forms.formSearch.submit()">
              <option value="">Direzione</option>
                <option <?= ($orderDir=='ASC')?'selected':'' ?> value='ASC'>ASC</option>
                <option <?= ($orderDir=='DESC')?'selected':'' ?> value='DESC'>DESC</option>
            </select>
          </div>

          <div class="form-group mx-1">
            <select id="recordsPerPage" class="form-control" name="recordsPerPage" onchange="document.forms.formSearch.page.value=1; document.forms.formSearch.submit()" >
              <option value="">Seleziona</option>
              <?php foreach ($recordPerPageOptions as $value): ?>
                <option <?= ($recordsPerPage==$value)?'selected':'' ?> value="<?=$value?>"><?=$value?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="form-group d-flex mx-1">
            <input class="form-control me-2" name="search" id="search" value="<?=$search?>"type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-primary"  onclick="document.forms.formSearch.page.value=1" type="submit">Search</button>
          </div>
        </form>

      </div>


    </div>
  </div>
</nav>
