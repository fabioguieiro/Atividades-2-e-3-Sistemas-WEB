<?php


namespace PetShop\Arquivos\Model;

use \PDO;
use \PDOException;

require_once 'Database.php';

class Users
{
  private $id, $name, $email, $password, $type, $remember_token, $created_at, $updated_at;

  public function __construct()
  {
    $database = new Database();
    $this->conn = $database->dbSet();
  }

  public function insert()
  {
    $query = "INSERT INTO users VALUES(:id, :name, :email, :password, :type, :remember_token, :created_at, :updated_at)";
    $stmt = $this->conn->prepare($query);

    $stmt->bindValue(":id", $this->id);
    $stmt->bindValue(":name", $this->name);
    $stmt->bindValue(":email", $this->email);
    $stmt->bindValue(':password', hash('sha1', $this->password));
    $stmt->bindValue(":type", $this->type);
    $stmt->bindValue(":remember_token", $this->remember_token);
    $stmt->bindValue(":created_at", $this->created_at);
    $stmt->bindValue(":updated_at", $this->updated_at);
    try {
      $stmt->execute();
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
    return $this->conn->lastInsertId();

  }

  public function view(){
    $stmt = $this->conn->prepare("SELECT * FROM `users` WHERE `email` LIKE :email");
    $stmt->bindValue(':email', '%' . $this->email . '%');
      $stmt->execute();
      return $stmt->fetch(PDO::FETCH_OBJ);
  }


  /**
  * @return mixed
  */
  public function getId()
  {
    return $this->id;
  }

  /**
  * @param mixed $id
  */
  public function setId($id)
  {
    $this->id = $id;
  }

  public function getNome()
  {
    return $this->nome;
  }

  /**
  * @param mixed $id
  */
  public function setNome($nome)
  {
    $this->nome = $nome;
  }
  
  
  /**
  * @return mixed
  */
  public function getEmail()
  {
    return $this->email;
  }

  /**
  * @param mixed $email
  */
  public function setEmail($email)
  {
    $this->email = $email;
  }

  /**
  * @return mixed
  */
  public function getPassword()
  {
    return $this->password;
  }

  /**
  * @param mixed $password
  */
  public function setPassword($password)
  {
    $this->password = $password;
  }

  public function getType()
  {
    return $this->type;
  }

  /**
  * @param mixed $id
  */
  public function setType($type)
  {
    $this->type = $type;
  }

  public function getCreated_at()
  {
    return $this->created_at;
  }

  /**
  * @param mixed $id
  */
  public function setCreated_at($created_at)
  {
    $this->created_at = $created_at;
  }

 public function getUpdated_at()
  {
    return $this->updated_at;
  }

  /**
  * @param mixed $id
  */
  public function setUpdated_at($updated_at)
  {
    $this->updated_at = $updated_at;
  }


}

?>
