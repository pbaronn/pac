<?php

//dados vindos do form
$nome = $_POST['nome'];
$datanascimento = date ('d/m/Y');
$Idade = $_POST['Idade'];
$Telefone = $_POST['Telefone'];
$responsavel = $_POST['Nome do Responsavel'];
$Endereco = $_POST['Endereco'];
$Bairro = $_POST['Bairro'];
$Numero = $_POST['Numero'];
$CEP = $_POST['CEP'];
$Observacoes = $_POST['Observacoes'];

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

$smtp = $conn-> prepare ("INSERT INTO universod (nome_associado, data_nascimento, idade, telefone, nome_responsavel, endereco, bairro, numero, cep, observacoes)
values (?,?,?,?,?,?,?,?,?,?) ");
$smtp->bind_param("ssssssssss", $nome, $datanascimento,
$Idade, $Telefone, $responsavel, $Endereco, $Bairro, $Numero,
$CEP, $Observacoes );

if($smtp->execute()){
    echo "Associado adicionado!";
}else{
    echo "Erro ao adicionar associado: " .$smtp->error;
}

$smtp->close();
$conn->close();