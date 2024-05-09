<?php
include 'classes/contacts.class.php';
$contato = new Contacts();
 
if(!empty($_GET['id_contatos'])){
    $id_contatos = $_GET['id_contatos'];
    $contato->deleteContact($id_contatos);
    header("Location: /agendasenac");
}else{
    echo '<script type="text/javascript">alert("deu bololô ao excluir o contato :( ")</script>';
    header("Location: /agendaSenac");
}
 
?>