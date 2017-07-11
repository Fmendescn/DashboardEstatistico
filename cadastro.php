<?php

//database
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'yourUsername');
define('DB_PASSWORD', 'yourPassword');
define('DB_NAME', 'dashboard');

$login = $_POST['login'];
$senha = MD5($_POST['senha']);

//get connection
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);


//query to get data from the table
$query_select = "SELECT * FROM usuarios WHERE login = '$login'";


//execute query
$result = $mysqli->query($query_select);

    if($login == "" || $login == null){
      echo"<script language='javascript' type='text/javascript'>alert('Todos os campos devem ser preenchidos');window.location.href='cadastro.html';</script>";
    }else{

        if($result->num_rows > 0){
          echo"<script language='javascript' type='text/javascript'>alert('Esse login já existe');window.location.href='cadastro.html';</script>";
        die();
        }else{

          $query_insert = "INSERT INTO usuarios (login,senha,permissao) VALUES('$login', '$senha',1)";

          $insertq = $mysqli->query($query_insert);


        //  die();

          if($insertq != 0){
              echo"<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso!');window.location.href='cadastro.html';</script>";

          }else{
              echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário');window.location.href='cadastro.html';</script>";
          }

        }
    }

$result->close();

 ?>
