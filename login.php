<?php

//database
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'yourUsername');
define('DB_PASSWORD', 'yourPassword');
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
          //Destrói
        	session_destroy();

        	//Limpa
        	unset ($_SESSION['login']);
        	unset ($_SESSION['senha']);
          die();
        }else{

          session_start();

          $_SESSION['login'] = $login;
          $_SESSION['senha'] = $senha;

          setcookie("login",$login);
          header("Location:index.php");


        }



       }

 ?>
