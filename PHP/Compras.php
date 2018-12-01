<?php

namespace PetShop\Arquivos\Model;

use \PDO;
use \PDOException;

require_once 'Database.php';

class Compras
{
  private $id, $user_id, $produto_id , $quantidade , $data, $created_at, $updated_at;

  public function __construct()
  {
    $database = new Database();
    $this->conn = $database->dbSet();
  }

  public function insert()
  {
    $query = "INSERT INTO produtos VALUES(:id,:user_id, :produto_id, :quantidade, :data,:created_at, :updated_at)";
    $stmt = $this->conn->prepare($query);

    $stmt->bindValue(":id", $this->id);
    $stmt->bindValue(":user_id", $this->user_id);
    $stmt->bindValue(":produto_id", $this->produto_id);
    $stmt->bindValue(":quantidade", $this->quantidade);
    $stmt->bindValue(":data", $this->data);
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
    $stmt = $this->conn->prepare("SELECT * FROM `compras`");
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
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

  /**
  * @return mixed
  */
  public function getUser_id()
  {
    return $this->user_id;
  }

  /**
  * @param mixed $email
  */
  public function setUser_id($user_id)
  {
    $this->user_id = $user_id;
  }

  /**
  * @return mixed
  */
  public function getProduto_id()
  {
    return $this->produto_id;
  }

  /**
  * @param mixed $password
  */
  public function setProduto_id($produto_id)
  {
    $this->produto_id = $produto_id;
  }
 /**
  * @return mixed
  */
  public function getQuantidade()
  {
    return $this->quantidade;
  }

  /**
  * @param mixed $password
  */
  public function setQuantidade($quantidade)
  {
    $this->quantidade = $quantidade;
  }
 /**
  * @return mixed
  */
  public function getData()
  {
    return $this->data;
  }

  /**
  * @param mixed $password
  */
  public function setData($data)
  {
    $this->data = $data;
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
  
  
   /**
  * @return mixed
  */
  public function getUpdated_at()
  {
    return $this->updated_at;
  }

  /**
  * @param mixed $password
  */
  public function setUpdated_at($updated_at)
  {
    $this->preco = $updated_at;
  }
  
}

?>
