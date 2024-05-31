<?php
require_once 'config.php';


//dados vindos do form
$nome = $_POST['nome'];
$data_nascimento = date ('d/m/Y');
$Idade = $_POST['Idade'];
$Telefone = $_POST['Telefone'];
$nome_responsavel = $_POST['Nome_Responsavel'];
$Endereco = $_POST['Endereco'];
$Bairro = $_POST['Bairro'];
$Numero = $_POST['Numero'];
$CEP = $_POST['CEP'];
$Observacoes = $_POST['Observacoes'];

// Depuração: Verificar se os dados estão sendo recebidos corretamente
echo "Nome: " . htmlspecialchars($nome) . "<br>";
echo "Data de Nascimento: " . htmlspecialchars($data_nascimento) . "<br>";
echo "Idade: " . htmlspecialchars($Idade) . "<br>";
echo "Telefone: " . htmlspecialchars($Telefone) . "<br>";
echo "Nome do Responsável: " . htmlspecialchars($nome_responsavel) . "<br>";
echo "Endereço: " . htmlspecialchars($Endereco) . "<br>";
echo "Bairro: " . htmlspecialchars($Bairro) . "<br>";
echo "Número: " . htmlspecialchars($Numero) . "<br>";
echo "CEP: " . htmlspecialchars($CEP) . "<br>";
echo "Observações: " . htmlspecialchars($Observacoes) . "<br>";




//preparar comando para a tabela
$smtp = $conn->prepare("INSERT INTO novos_associados (nome, data_nascimento, idade, telefone, nome_responsavel, 
endereco, bairro, numero, cep, observacoes) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$smtp->bind_param("ssssssssss", $nome, $data_nascimento, $Idade, 
$Telefone, $nome_responsavel, $Endereco, $Bairro, $Numero, 
$CEP, $Observacoes);


//se executar corretamente
if($smtp->execute()){
    echo "Associado adicionado!";
}else{
    echo "Erro ao adicionar associado: " .$smtp->error;
}

$smtp->close();
$conn->close();

?>