<?php
include 'classes/contacts.class.php';
$contato = new Contacts();
 
if(!empty($_POST['email'])){
    $nome = $_POST ['nome'];
    $email = $_POST ['email'];
    $profissao = $_POST ['profissao'];
    $telefone = $_POST ['telefone'];
    $numero = $_POST ['numero'];
    $rua = $_POST ['rua'];
    $bairro = $_POST ['bairro'];
    $cep = $_POST ['cep'];
    $cidade = $_POST ['cidade'];
    $foto = $_POST ['foto'];
 
    $contato->addContact($nome, $email, $telefone, $cidade, $rua, $numero, $bairro, $cep, $profissao, $foto);
    header('Location: index.php');
}else{
    echo '<script type="text/javascript">alert("Email já cadastrado! (BURRO!)");</script>';
}
?>