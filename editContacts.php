<?php
    include 'classes/contacts.class.php';
    $contato = new Contacts();
 
    if(!empty($_GET['id_contatos'])){
        $id = $_GET['id_contatos'];
        $info = $contato->searchContact($id);
        if(empty($info['email'])){
            header("Location: /agendaSenac");
            exit;
        }
   
    }else{
        header("Location: /agendaSenac");
        exit;
    }
 
?>
 
<h1>EDITAR</h1>
<form method="POST" action="editContactsSubmit.php">
    <input type="hidden" name="id_contatos" value="<?php echo $info['id_contatos'] ?>"/>
    Nome: <br>
    <input type="text" name="nome" value="<?php echo $info['nome'] ?>"/><br><br>
    Email: <br>
    <input type="text" name="email" value="<?php echo $info['email'] ?>"/><br><br>
    Profissao: <br>
    <input type="text" name="profissao" value="<?php echo $info['profissao'] ?>"/><br><br>
    Telefone: <br>
    <input type="text" name="telefone" value="<?php echo $info['telefone'] ?>"/><br><br>
    Numero: <br>
    <input type="text" name="numero" value="<?php echo $info['numero'] ?>"/><br><br>
    Rua: <br>
    <input type="text" name="rua" value="<?php echo $info['rua'] ?>"/><br><br>
    Bairro: <br>
    <input type="text" name="bairro" value="<?php echo $info['bairro'] ?>"/><br><br>
    CEP: <br>
    <input type="text" name="cep" value="<?php echo $info['cep'] ?>"/><br><br>
    Cidade: <br>
    <input type="text" name="cidade" value="<?php echo $info['cidade'] ?>"/><br><br>
    Foto: <br>
    <input type="text" name="foto" value="<?php echo $info['foto'] ?>"/><br><br>
 
    <input type="submit" name="btCadastrar" value="EDITAR"/>
 
 
</form>