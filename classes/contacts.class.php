<?php

require 'connect.class.php';

class Contacts
{

    private $id;
    private $nome;
    private $email;
    private $telefone;
    private $cidade;
    private $rua;
    private $numero;
    private $bairo;
    private $cep;
    private $profissao;
    private $foto;

    private $con;

    public function __construct()
    {
        $this->con = new Connect();
    }
    private function validateEmail($email)
    {
        $sql = $this->con->connection()->prepare("SELECT id_contatos FROM contatos WHERE email = :email");
        $sql->bindParam(':email', $email, PDO::PARAM_STR);
        $sql->execute();

        if($sql->rowCount() > 0)
        {
            $array = $sql->fetch();
        }
        else
        {
            $array = array();
        }

        return $array;
    }

    public function addContact($nome,$email,$telefone,$cidade,$rua,$numero,$bairro,$cep,$profissao,$foto)
    {
        $validateEmail = $this->validateEmail($email);
        if(count($validateEmail) == 0)
        {
            try
            {
                $this->nome = $nome;
                $this->email = $email;
                $this->telefone = $telefone;
                $this->cidade = $cidade;
                $this->rua = $rua;
                $this->numero = $numero;
                $this->bairo = $bairro;
                $this->cep = $cep;
                $this->profissao = $profissao;
                $this->foto = $foto;

                $sql = $this->con->connection()->prepare("INSERT INTO contatos (nome,email,telefone,cidade,rua,numero,bairro,cep,profissao,foto) VALUES (:nome,:email,:telefone,:cidade,:rua,:numero,:bairro,:cep,:profissao,:foto)");

                $sql->bindParam(":nome", $this->nome, PDO::PARAM_STR);
                $sql->bindParam(":email", $this->email, PDO::PARAM_STR);
                $sql->bindParam(":telefone", $this->telefone, PDO::PARAM_STR);
                $sql->bindParam(":cidade", $this->cidade, PDO::PARAM_STR);
                $sql->bindParam(":rua", $this->rua, PDO::PARAM_STR);
                $sql->bindParam(":numero", $this->numero, PDO::PARAM_STR);
                $sql->bindParam(":bairro", $this->bairo, PDO::PARAM_STR);
                $sql->bindParam(":cep", $this->cep, PDO::PARAM_STR);
                $sql->bindParam(":profissao", $this->profissao, PDO::PARAM_STR);
                $sql->bindParam(":foto", $this->foto, PDO::PARAM_STR);
                $sql->execute();
                
                return TRUE;
            }
            catch (PDOException $ex)
            {
                return 'ERRO: '.$ex->getMessage();
            }
        }
        else
        {
            return FALSE;
        }
    }


    public function listContacts()
    {
        try
        {
            $sql = $this->con->connection()->prepare("SELECT id_contatos, nome, email, telefone, cidade, rua, numero, bairro, cep, profissao, foto FROM contatos");
            
            $sql->execute();
            return $sql->fetchAll();
        }
        catch (PDOException $ex)
        {
            return 'ERRO: '.$ex->getMessage();
        }
    }


    public function showContact($id)
    {
        try
        {
            $sql = $this->con->connection()->prepare("SELECT id_contatos, nome, email, telefone, cidade, rua, numero, bairro, cep, profissao, foto FROM contatos WHERE id_contatos = :id ");
            $sql->bindValue(':id', $id);
            $sql->execute();
            if($sql->rowCount() > 0)
            {
                return $sql->fetch();
            }
            else
            {
                return array();
            }

            return $sql->fetchAll();
        }
        catch (PDOException $ex)
        {
            return 'ERRO: '.$ex->getMessage();
        }
    }
    public function searchContact($id){
        try{
            $sql = $this->con->connection()->prepare("SELECT * FROM contatos WHERE id_contatos = :id");
            $sql->bindValue(':id', $id);
            $sql->execute();
            if($sql->rowCount() > 0){
                return $sql->fetch();
            }else{
                return array();
            }
        }catch(PDOException $ex){
            echo "ERRO: " .$ex->getMessage();
        }
    }
    public function editContact($nome,$email,$telefone,$cidade,$rua,$numero,$bairro,$cep,$profissao,$foto,$id_contatos)
    {
        $existEmail = $this->validateEmail($email);
        if(count($existEmail) > 0 && $existEmail['id_contatos'] != $id_contatos)
        {
            return FALSE;
        }
        else
        {
            try
            {
                $sql = $this->con->connection()->prepare("UPDATE contatos SET nome = :nome, email = :email, telefone = :telefone, cidade = :cidade, rua = :rua, numero = :numero, bairro = :bairro, cep = :cep, profissao = :profissao, foto = :foto WHERE id_contatos = :id_contatos");

                $sql->bindValue(':nome', $nome);
                $sql->bindValue(':email', $email);
                $sql->bindValue(':telefone', $telefone);
                $sql->bindValue(':cidade', $cidade);
                $sql->bindValue(':rua', $rua);
                $sql->bindValue(':numero', $numero);
                $sql->bindValue(':bairro', $bairro);
                $sql->bindValue(':cep', $cep);
                $sql->bindValue(':profissao', $profissao);
                $sql->bindValue(':foto', $foto);
                $sql->bindValue(':id_contatos', $id_contatos);

                $sql->execute();

                return TRUE;
            }
            catch(PDOException $ex)
            {
                echo 'ERRO: '.$ex->getMessage();
            }
        }
    }
    public function excludeContact($id)
    {
        $sql = $this->con->connection()->prepare("DELETE FROM contatos WHERE id_contatos = :id");
        $sql->bindValue('id',$id);
        $sql->execute();
    }
}

?>