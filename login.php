<?php
    session_start();
    require_once 'inc/header.inc.php';
    require_once 'classes/user.class.php';

    if(!empty($_POST['email']))
    {
        $email = addslashes($_POST['email']);
        $senha = md5($_POST['senha']);

        $users = new User();
        if($users->doLogin($email,$senha))
        {
            header("Location: index.php");
            exit;
        }
        else
        {
            echo '<span style="color: green">'."Usuário e/ou Senha incorreto(s)!!!".'</span>';
        }
    }
?>

<h1>LOGIN</h1>

<form method="POST">
    Email: <br>
    <input type="email" name="email"><br><br>

    Senha: <br>
    <input type="password" name="senha"><br><br>

    <input type="submit" value="Login"><br><br>
</form>


<?php
    require_once 'inc/footer.inc.php';
?>