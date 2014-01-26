<?php

class User {
  
  private $user_id;
  private $username;
  private $password;

  public function __construct($user_id, $username, $password) {
    $this->user_id = $user_id;
    $this->username = $username;
    $this->password = $password;
  }
  /* Tähän gettereitä ja settereitä */


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
  }

}