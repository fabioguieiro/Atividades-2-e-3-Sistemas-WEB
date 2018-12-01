<?php

namespace PetShop\Arquivos\Model;

use \PDO;
use \PDOException;

require_once 'Database.php';

class produto
{
  private $id, $nome, $preco , $imagem , $created_at, $updated_at;

  public function __construct()
  {
    $database = new Database();
    $this->conn = $database->dbSet();
  }

  public function insert()
  {
    $query = "INSERT INTO produtos VALUES(:id,:nome, :preco, :imagem, :created_at,NULL)";
    $stmt = $this->conn->prepare($query);

    $stmt->bindValue(":id", $this->id);
    $stmt->bindValue(":nome", $this->nome);
    $stmt->bindValue(":preco", $this->preco);
    $stmt->bindValue(":imagem", $this->imagem);
    $stmt->bindValue(":created_at", $this->created_at);
	
    try {
      $stmt->execute();
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
    return $this->conn->lastInsertId();

  }

  public function view(){
    $stmt = $this->conn->prepare("SELECT * FROM `produtos`");
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
  public function getNome()
  {
    return $this->nome;
  }

  /**
  * @param mixed $email
  */
  public function setNome($nome)
  {
    $this->nome = $nome;
  }

  /**
  * @return mixed
  */
  public function getPreco()
  {
    return $this->preco;
  }

  /**
  * @param mixed $password
  */
  public function setPreco($preco)
  {
    $this->preco = $preco;
  }
 /**
  * @return mixed
  */
  public function getImagem()
  {
    return $this->imagem;
  }

  /**
  * @param mixed $password
  */
  public function setImagem($imagem)
  {
    $this->imagem = $imagem;
  }
 /**
  * @return mixed
  */
  public function getCreated_at()
  {
    return $this->created_at;
  }

  /**
  * @param mixed $password
  */
  public function setCreated_at($created_at)
  {
    $this->preco = $created_at;
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
