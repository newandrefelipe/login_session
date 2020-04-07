<?php

class Login
{
    public function autenticar($login, $senha): bool {
        // echo $login . '<br>' . $senha . '<br>';

        $conn = new \PDO('mysql:host=localhost;dbname=login', 'root', 'root');

        $sql = 'SELECT id FROM usuarios WHERE login = :login_ AND senha = :senha';
        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':login_', $login, PDO::PARAM_STR);
        $stmt->bindValue(':senha', $senha, PDO::PARAM_STR);

        $stmt->execute();

        $result = $stmt->fetchAll();

        if (count($result) === 1)
        {
            session_start();

            $_SESSION['login'] = $login;

            return true;
        }

        return false;
    }
}