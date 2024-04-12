<?php

include 'classes/contacts.class.php';

$contact = new Contacts();

if(!empty($_GET['id_contatos']))
{
    $id = $_GET['id_contatos'];
    $contact->excludeContact($id);

    header("Location: /agendaSenac");
}
else
{
    echo '<script type="text/javascript">alert("Erro ao excluir o contato!");</script>';

    header("Location: /agendaSenac");
}