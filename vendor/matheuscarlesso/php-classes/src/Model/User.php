<?php

namespace MatheusCarlesso\Model;

use \MatheusCarlesso\DB\Sql;
use \MatheusCarlesso\Model;

//use mysql_xdevapi\Exception;

class User extends Model{

    const SESSION = "User";

    public static function login($login, $password)
    {

        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tb_users WHERE deslogin = :LOGIN", array(
            ":LOGIN"=>$login
        ));

        if(count($results) == 0)
        {
            throw new \Exception("Usuario invalido ou senha incorreta",1);
        }

        $data = $results[0];

        if (password_verify($password, $data["despassword"]) == true)
        {
            $user = new User();

            $user->setData($data);

            $_SESSION[User::SESSION] = $user->getValues();

            return $user;



        }else{
            throw new \Exception("Usuario invalido ou senha incorreta",1);
        }
    }

    public static function verifyLogin($inadmin = true)
    {
        if (
            !isset($_SESSION[User::SESSION])
            ||
            !$_SESSION[User::SESSION]
            ||
            !(int)$_SESSION[User::SESSION]["iduser"] > 0 //verifica se o id do usuário não for vazio. Se for maior que 0 é um usuário
            ||
            (bool)$_SESSION[User::SESSION]["inadmin"] !== $inadmin //verifica se o usuário é um usuário admin  "bool" = boolean
        ) {

            header("Location: /admin/login");
            exit;

        }
    }

    public static function logout()
    {
        $_SESSION[User::SESSION] = NULL;
    }

    public static function listAll()
    {

        $sql = new Sql();

        return $sql->select("SELECT * FROM tb_users a INNER JOIN tb_persons b USING(idperson) ORDER BY b.desperson");
    }

    public function get($iduser)
    {

        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tb_users a INNER JOIN tb_persons b USING(idperson) WHERE a.iduser = :iduser;", array(
            ":iduser"=>$iduser
        ));

        $data = $results[0];

        $this->setData($data);

    }

    public function save()
    {
        $sql = new Sql();

        $result = $sql->select("CALL sp_users_save(:desperson, :deslogin, :despassword, :desemail, :nrphone, :inadmin)", array(
            ":desperson"=>$this->getdesperson(),
            ":deslogin"=>$this->getdeslogin(),
            ":despassword"=>$this->getdespassword(),
            ":desemail"=>$this->getdesemail(),
            ":nrphone"=>$this->getnrphone(),
            ":inadmin"=>$this->getinadmin(),
        ));

        $this->setData($result[0]);
    }

    public function update()
    {
        $sql = new Sql();

        $result = $sql->select("CALL sp_usersupdate_save(:iduser, :desperson, :deslogin, :despassword, :desemail, :nrphone,
            :inadmin)", array(
            ":iduser"=>$this->getiduser(),
            ":desperson"=>$this->getdesperson(),
            ":deslogin"=>$this->getdeslogin(),
            ":despassword"=>$this->getdespassword(),
            ":desemail"=>$this->getdesemail(),
            ":nrphone"=>$this->getnrphone(),
            ":inadmin"=>$this->getinadmin()
        ));

        $this->setData($result[0]);

    }

    public function delete()
    {
        $sql = new Sql();

        $sql->query("CALL sp_users_delete(:iduser)", array(
            ":iduser"=>$this->getiduser()
    ));
    }
}

?>