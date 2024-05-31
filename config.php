<?php

//config de variaveis
$server = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'universod';

//conexao com o banco
$conn = new mysqli($server, $usuario, $senha, $banco);


//ver se tem erro na conexao
if($conn-> connect_error)
{
    die ("Falha ao se comunicar com o banco:  ".$conn->connect_error);
}












?>