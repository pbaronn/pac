comandos para adicionar novos associados

adiconar nome obrigatorio
<input type="text" name="Nome"  placeholder="Digite o nome completo do associado" required>

adicionar data de nascimento
<input type="text" name="Data de Nascimento"  placeholder="Digite a data de nascimento" required>


adicionar idade
<input type="text" name="Idade"  placeholder="Digite a idade" required>

adicionar telefone
<input type="text" name="Telefone"  placeholder="Digite o Telefone" required>

adicionar nome do responsavel
<input type="text" name="Nome do Responsavel"  placeholder="Digite o nome do Responsável" required>

adicionar endereço
<input type="text" name="Endereco"  placeholder="Digite o nome da Rua"required>

adicionar bairro
<input type="text" name="Bairro"  placeholder="Digite o nome completo do bairro"required>

adicionar numero da casa
<input type="text" name="Numero"  placeholder="Digite o número" required>

adionar cep
<input type="text" name="CEP"  placeholder="Digite o CEP">

adicionar observações
<textarea name=" Observacoes" rows="5" placeholder="Digite as Observações">
</textarea>

botão para confirmar adição de associado
<button type="submit">Adicionar</button>

_____________________________________________________________

Receber dados vindos do form

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

______________________________________


Verificar se os dados estão sendo recebidos corretamente

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



______________________________________

Dar instruções ao banco

$smtp = $conn->prepare("INSERT INTO novos_associados (nome, data_nascimento, idade, telefone, nome_responsavel, 
endereco, bairro, numero, cep, observacoes) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");  (??) sao mascaras para dar proteção aos dados

//indicar valores que serao colocados nas mascaras
$smtp->bind_param("ssssssssss", $nome, $data_nascimento, $Idade, 
$Telefone, $nome_responsavel, $Endereco, $Bairro, $Numero, 
$CEP, $Observacoes);

______________________________________

se executar corretamente

if($smtp->execute()){
    echo "Associado adicionado!";
}else{
    echo "Erro ao adicionar associado: " .$smtp->error;
}

$smtp->close();
$conn->close();

?>
_______________________________________
Configuração 
$server = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'universod';

____________________________________

conexão com o banco de dados
$conn = new mysqli($server, $usuario, $senha, $banco);

__________________________________________

ver se tem erro na conexao com o banco de dados

if($conn-> connect_error)
{
    die ("Falha ao se comunicar com o banco:  ".$conn->connect_error);
}

____________________________________________

equire_once 'config.php';

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



//formulario para digitar senha
<form action= method="post"> 
    <label for="senha"> Senha:</label>
    <input type="password" name="senha"  placeholder="Digite sua senha" required>
<button type="submit">Adicionar</button>


//Verifica se tem algo no banco
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

    <?php else : ?>
    <p> Nenhum associado encontrado. </p>
<?php endif; ?>




