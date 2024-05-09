<?php
    include 'classes/contacts.class.php';
    include 'classes/user.class.php';

    session_start();

    if(!isset($_SESSION['logged']))
    {
        header("Location: login.php");
        exit;
    }

    $user = new User();
    $user->setUser($_SESSION['logged']);
    $contato = new Contacts();
?>

    <h1>Agenda Senac</h1>
    <hr>

    <?php if($user->havePermission('add')): ?><button><a href="addContacts.php">ADICIONAR</a></button><?php endif ?><br><br>
    <button><a href="exit.php">SAIR</a></button>
    

    <br><br><br>

    <table border="5" width=100%>
        <tr>
            <th>ID</th>
            <th>NOME</th>
            <th>EMAIL</th>
            <th>TELEFONE</th>
            <th>CIDADE</th>
            <th>RUA</th>
            <th>NÚMERO</th>
            <th>BAIRRO</th>
            <th>CEP</th>
            <th>PROFISSAO</th>
            <th>FOTO</th>
            <th>AÇÕES</th>
        </tr>

    <?php
        $lista = $contato->listContacts();
        foreach($lista as $item) : 
    ?>

        <tbody>
            <tr>
                <td><?php echo $item['id_contatos']; ?></td>
                <td><?php echo $item['nome']; ?></td>
                <td><?php echo $item['email'] ;?></td>
                <td><?php echo $item['telefone']; ?></td>
                <td><?php echo $item['cidade']; ?></td>
                <td><?php echo $item['rua']; ?></td>
                <td><?php echo $item['numero']; ?></td>
                <td><?php echo $item['bairro']; ?></td>
                <td><?php echo $item['cep']; ?></td>
                <td><?php echo $item['profissao']; ?></td>
                <td><?php echo $item['foto']; ?></td>
                <td>
                    <?php if($user->havePermission('edit')): ?><a href="editContacts.php?id_contatos=<?php echo $item['id_contatos']?>">EDITAR</a><?php endif ?>
                    <?php if($user->havePermission('del')): ?><a href="deleteContacts.php?id_contatos=<?php echo $item['id_contatos']?>">EXCLUIR</a><?php endif ?>
                </td>
            </tr>
        </tbody>

    <?php
        endforeach;
    ?>

    </table>