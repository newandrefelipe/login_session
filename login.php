<?php
require_once('html_header.php');
require_once('LoginClass.php');

session_start();

if (isset($_SESSION['login']))
{
    header('Location: index.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    $loginObj = new Login();
    $loginOK = $loginObj->autenticar($login, $senha);

    if ($loginOK)
    {
        header('Location: index.php');
    }
    else
    {
        echo '<div>Login inválido, verifique os dados digitados e tente novamente.</div>';
    }
}
?>

<form method="post" action="login.php">
    <div>
        <label for="login">Login:</label>
        <input type="text" name="login" id="login" autofocus>
    </div>
    <div>
        <label for="senha">Senha:</label>
        <input type="text" name="senha" id="senha">
    </div>
    <button>Logar</button>
</form>

<?php
require_once('html_footer.php');
?>