
<nav class="navbar navbar-expand-lg navbar-light justify-content-center">

  <div class="container-fluid d-flex justify-content-center py-3">
    <div id="navbarNavAltMarkup">
      <div class="navbar-nav">

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
