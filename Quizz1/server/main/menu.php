<?php
if (isset($_GET['logout']) && $_GET['logout'] == 1) {
  unset($_SESSION['admin']);
?>
  <script>
    window.location.replace("login.php");
  </script>
<?php
}
?>
<nav id="nav-profile" class="navbar navbar-expand-lg navbar-light bg-light">

<div class="container">
<a id="menu-profile" href="index.php" class="navbar-nav mx-2 nav-link" aria-current="page"><i class="fa fa-home" style="font-size:24px"></i></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a id="menu-profile" href="index.php?action=users&query=usersrp" class="nav-link">ACCOUNT</a>
            <a id="menu-profile" href="index.php?action=category&query=add" class="nav-link" aria-current="page">QUIZZES</a>
        </div>
    </div>
    <a id="menu-profile" href="index.php?logout=1" class="navbar-nav mx-2 nav-link"><i class="fa fa-sign-out" style="font-size:24px"></i></a>
</div>
</nav>