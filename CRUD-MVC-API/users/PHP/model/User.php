<?php

// THE USERS API

// model to interact with the user table

class User{
  // DB properties
  private $Conn;
  private $table="Users";

  // user properties
  public $id;
  public $userName;
  public $userEmail;
  public $userPassword;

  // constructor that recives Conn to DB
  public function __construct($db){
    $this->conn=$db;
  }


  //----------------------------------------------------------
  // GET ALL USERS
  public function readAll(){

    $query='SELECT * from '.$this->table;

    // prep PDOStatement
    $stmt=$this->conn->prepare($query);
    // execute query
    $stmt->execute();

    //  $result=$stmt->fetchAll();
    return $stmt;
  }


  //----------------------------------------------------------
  // READ SINGLE USER
  public function readSingleUser(){

    $query='SELECT * from '.$this->table.' WHERE id =:id';

    // prep PDOStatement
    $stmt=$this->conn->prepare($query);
    $stmt->bindParam('id',$this->id);
    // execute query
    $stmt->execute();

    return $stmt;
  }


  //----------------------------------------------------------
  // POST CODE CREATE USER
  public function createUser(){

    $query='INSERT INTO '.$this->table.'
    SET
    username=:username,
    email=:email,
    password=:password';

    $stmt=$this->conn->prepare($query);

    $stmt->bindParam('username',$this->userName);
    $stmt->bindParam('email',$this->userEmail);
    $stmt->bindParam('password',$this->userPassword);

    if($stmt->execute()){

      return true;
    }
    else{
      // errors
      echo "Error: ".$stmt->error();
      return false;
    }

  }


  //----------------------------------------------------------
  // UPDATE USER
  public function updateUser(){

    $query='UPDATE '.$this->table.'
    SET
    username=:username,
    email=:email,
    password=:password
    WHERE
    id=:id';

    $stmt=$this->conn->prepare($query);

    $stmt->bindParam('username',$this->userName);
    $stmt->bindParam('email',$this->userEmail);
    $stmt->bindParam('password',$this->userPassword);
    $stmt->bindParam('id',$this->id);

    if($stmt->execute()){
      return true;
    }
    else{
      // errors
      echo "Error: ".$stmt->error();
      return false;
    }

  }


  //----------------------------------------------------------
  // DELETE USER
  public function deleteUser(){

    $query='DELETE FROM '.$this->table.'
    WHERE id=:id';

    $stmt=$this->conn->prepare($query);

    $stmt->bindParam('id',$this->id);

    if($stmt->execute()){
      return true;
    }
    else{
      // errors
      echo "Error: ".$stmt->error();
      return false;
    }

  }


}
?>