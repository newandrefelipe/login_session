<?php
require_once('html_header.php');

session_start();

if (!isset($_SESSION['login'])) {
    header('Location: login.php');
}
?>

<a href="logout.php">Logout</a>

<h3>Seja bem-vindo <?=$_SESSION['login']?></h3>

<?php
require_once('html_footer.php');
?>