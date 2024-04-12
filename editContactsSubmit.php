<?php

include 'classes/contacts.class.php';

$contact = new Contacts();

if(!empty($_POST['id_contatos']))
{
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $cidade = $_POST['cidade'];
    $rua = $_POST['rua'];
    $numero = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $cep = $_POST['cep'];
    $profissao = $_POST['profissao'];
    $foto = $_POST['foto'];
    $id_contatos = $_POST['id_contatos'];

    if(!empty($email))
    {
        $contact->editContact($nome, $email, $telefone, $cidade, $rua, $numero, $bairro, $cep, $profissao, $foto, $id_contatos);
    }
    header("Location: /agendaSenac");
}