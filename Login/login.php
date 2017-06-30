<?php

//database
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'your_username');
define('DB_PASSWORD', 'your_password');
define('DB_NAME', 'dashboard');

$login = $_POST['login'];
$senha = MD5($_POST['senha']);
$entrar = $_POST['entrar'];


//get connection
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

    if (isset($entrar)){

         $mysql_query = "SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha'";
         $verifica = $mysqli->query($mysql_query);

        if ($verifica->num_rows <= 0){
          echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='cadastro.html';</script>";
          die();
        }else{
          setcookie("login",$login);
          header("Location:index.php");;
        }



       }

 ?>
