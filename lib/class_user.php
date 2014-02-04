<?php

require_once 'lib/class_owns.php';
require_once 'lib/tietokantayhteys.php';

class User {
  
  private $user_id;
  private $username;
  private $password;

  public function __construct($user_id, $username, $password) {
    $this->user_id = $user_id;
    $this->username = $username;
    $this->password = $password;
  }

  public function getUsername() {
    return $this->username;
  }

  public function getOwned() {
    $sql = "SELECT yarn, amount FROM owns WHERE owner = 1";
    $query = getTietokantayhteys()->prepare($sql);
    $query->execute($this->user_id);

    $ret = array();
    $ret[] = new Owns(123,234,345);
	 foreach($query->fetchAll(PDO::FETCH_OBJ) as $tulos) {
	     $ret[] = new Owns($this->user_id, $tulos->yarn, $tulos->amount);
	 }

    return $ret;

  }  

  public static function getUserByUsername($user, $password) {
    $sql = "SELECT user_id, username, password from users where username = ? AND password = ? LIMIT 1";
    $query = getTietokantayhteys()->prepare($sql);
    $query->execute(array($user, $password));

    $result = $query->fetchObject();
    if ($result == null) {
      return null;
    } else {
      $user = new User($result->user_id, $result->username, $result->password);
      return $user;
    }
}

  public static function getUsers() {

	 $yhteys = getTietokantayhteys();
	 $sql = "SELECT user_id, username, password from users";
	 $kysely = getTietokantayhteys()->prepare($sql);
	 $kysely->execute();

	 $tulokset = array();
	 foreach($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
	 $kayttaja = new User($tulos->user_id, $tulos->username, $tulos->password);
	 $tulokset[] = $kayttaja;
	 }

	 return $tulokset;
  }

}