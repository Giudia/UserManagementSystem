
  
<nav class="navbar navbar-expand-lg bg-light navbar-light fixed-top" role="navigation">
    <div class="container">
        <!-- icona mobile-->
        <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
            &#9776;
        </button>
        <div class="collapse navbar-collapse" id="exCollapsingNavbar">
            <div class="navbar-nav">

            <?php
                //Elenco utenti
                $classActive = (stripos($url,'index') && empty($_GET['action']));
                $class = $classActive? 'active':'';
            ?>
            <a class="nav-link <?= $class ?>"href="index.php"><i class="fas fa-users"></i> Users</a>

            <?php
                //Inserimento utente
                $classActive = (stripos($url,'index') && !empty($_GET['action']) && $_GET['action'] === 'insert');
                $class = $classActive? 'active':'';
            ?>
            <a class="nav-link <?= $class ?>" href="formUpdateUser.php?action=save"><i class="fas fa-user-plus"></i> Add user</a>
            </div>

            <!-- menu login-->

            <div class="d-flex collapse navbar-collapse col-md-3 justify-content-end" id="navbarNavDarkDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <form class="px-4 py-3">
                            <div class="mb-3">
                            <label for="exampleDropdownFormEmail1" class="form-label">Email</label>
                            <input type="email" class="form-control" id="exampleDropdownFormEmail1" placeholder="email@example.com">
                            </div>
                            <div class="mb-3">
                            <label for="exampleDropdownFormPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="exampleDropdownFormPassword1" placeholder="Password">
                            </div>
                            <div class="mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="dropdownCheck">
                                <label class="form-check-label" for="dropdownCheck">
                                Remember me
                                </label>
                            </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Log in</button>
                        </form>
                        <!--
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">New around here? Sign up</a>
                        <a class="dropdown-item" href="#">Forgot password?</a>-->
                    </div>
                    </li>
                </ul>
            </div>
            
        </div>
    </div>
</nav>




