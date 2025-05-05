<?php
$servername = "sql10.freesqldatabase.com";
$username = "sql10772572";
$password = "K4k6nLjhNz";
$dbname = "sql10772572";
$port = "3306";

    $conexao = new mysqli($servername, $username, $password, $dbname, $port);

    if($conexao->connect_error){
        die("Conexão do banco falhou:" . $conexao->connect_error);
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $rua = $_POST['rua'];
        $numero = $_POST['numero'];
        $complemento = $_POST['complemento'];
        $bairro = $_POST['bairro'];
        $cidade = $_POST['cidade'];
        $cep = $_POST['cep'];
        
        $rotinaSql = $conexao->prepare("INSERT INTO pizzaria(nome, email, telefone, rua, numero, complemento, bairro, cidade, cep ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $rotinaSql->bind_param("sssssssss", $nome, $email, $telefone, $rua, $numero, $complemento, $bairro, $cidade, $cep);

        if($rotinaSql->execute()){
            echo "Dados inseridos com sucesso!";
        }else{
            echo "Erro ao inserir dados." . $rotinaSql->error;
        }
        
        $rotinaSql->close();
    }
    $conexao->close();

?>