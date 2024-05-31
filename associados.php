<?php
require_once 'config.php';

$senhaSecreta = "123";
if($_SERVER["REQUEST_METHOD"] == "POST")
{
   $senhadigitada = $_POST['senha'];


   //se a senha digitada for correta
   if($senhadigitada === $senhasecreta)
   $sql = "SELECT * FROM novos_associados";
   $result = $conn->query(sql);
}else{
    echo "<h1>Senha Incorreta!</h1>";
}


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title> Ver associados </title>
<link rel="stylesheet" href="estilo.css">

</head>


<body>
<form action= method="post"> 
    <label for="senha"> Senha:</label>
    <input type="password" name="senha"  placeholder="Digite sua senha" required>
<button type="submit">Entrar</button>
</form>

<div class="associado">

<?php if(isset($result) && $result->num_rows>0) : ?>
    <h2>Associados</h2>
    <ul>
<?php while($row = $result->fetch_assoc()) : ?>
    <li>
        <strong>Nome: </strong> <?php echo $row ["nome"]; ?><br>
        <strong>Nome: </strong> <?php echo $row ["data_nascimento"]; ?><br>
        <strong>Nome: </strong> <?php echo $row ["idade"]; ?><br>
        <strong>Nome: </strong> <?php echo $row ["telefone"]; ?><br>
        <strong>Nome: </strong> <?php echo $row ["nome_responsavel"]; ?><br>
        <strong>Nome: </strong> <?php echo $row ["endereco"]; ?><br>
        <strong>Nome: </strong> <?php echo $row ["bairro"]; ?><br>
        <strong>Nome: </strong> <?php echo $row ["numero"]; ?><br>
        <strong>Nome: </strong> <?php echo $row ["cep"]; ?><br>
        <strong>Nome: </strong> <?php echo $row ["observacoes"]; ?><br>

    </li>
    <?php endwhile; ?>
</ul>

<?php else : ?>
    <p> Nenhum associado encontrado. </p>
<?php endif; ?>
</div>



</body>




</html>