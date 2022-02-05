<?php
  session_start();

  //Genero il token per la sicurezza della provenienza dei dati di login
  $bytes = random_bytes(32);
  $token = bin2hex($bytes);
  //Salvo il token nella sezione
  $_SESSION['csrf'] = $token;

  require_once 'view/head.php';
  
?>

<section class="container">
  <div class="loginForm">
    <form action="verify-login.php" method="POST">

      <input hidden name="_csrf" value="<?= $token?>"> <!-- passo il token come campo nascosto-->

      <div class="form-group">
        <label for="UserEmail">Email</label>
        <input type="email" class="form-control" id="UserEmail" name="UserEmail" aria-describedby="emailHelp" placeholder="Email" required>
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="UserPassword" name="UserPassword" placeholder="Password" required>
      </div>
      <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" name="remember" for="exampleCheck1">Check me out</label>
      </div>
      <button type="submit" class="btn btn-primary">Login</button>
    </form>
  </div>
</section>

<?php
    require_once 'view/footer.php';
?>