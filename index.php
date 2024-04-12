<?php
    include 'classes/contacts.class.php';
    $contato = new Contacts();
?>

    <h1>Agenda Senac</h1>
    <hr>

    <button><a href="addContacts.php">ADICIONAR</a></button>
    

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
                    <a href="editContacts.php?id_contatos=<?php echo $item['id_contatos']?>"><button>EDITAR</button></a>
                    <a href="excludeContacts.php?id_contatos=<?php echo $item['id_contatos']?> " onClick = "return confirm ('Tem certeza que deseja excluir este contato?')"><button>EXCLUIR</button></a>
                </td>
            </tr>
        </tbody>

    <?php
        endforeach;
    ?>

    </table>