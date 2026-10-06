<?php
session_start();
require_once "conexao.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $texto = $_POST['texto'] ?? '';
    $idpostagem = $_POST['idpostagem'] ?? '';
    $idusuario = $_POST['idusuario'] ?? '';

    $_SESSION['texto'] = $texto;
    $_SESSION['idusuario'] = $idusuario;

    $sql = "INSERT INTO comentario (idusuario, idpostagem, texto) VALUES (?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);

    if ($comando) {
        mysqli_stmt_bind_param($comando, "iis", $idusuario, $idpostagem, $texto);
        
        mysqli_stmt_execute($comando);
        mysqli_stmt_close($comando);
    }

    header("Location: listar_postagem.php");
    exit();
}
?>c<?php
//pegar as variáveis
$nome = $_POST['nome'];
$carga-horaria = $_POST['carga-horaria'];
$email = $_POST['email'];
$turma = $_POST['turma'];


//monta o SQL
// INSERT INTO aluno (nome, data_nascimento, email, turma)
// VALUES ('Teste', '2000-12-31', 'Mestre História');
$sql = "INSERT INTO aluno (nome, data-nascimento, email, turma) VALUES ('$nome', '$data-nascimento', '$email', '$turma')";

//executa SQL
require_once "../conexao.php";
mysqli_query($conexao, $sql);


//desvia a navegação
header("Location: ../sucesso.html");