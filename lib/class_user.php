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

  public function getUsername() {
    return $this->username;
  }

  public function getOwned() {

    $sql = "SELECT yarn.yarn_id, yarn.yarnname, yarn.yarnmanu, yarn.nsrmin, yarn.nsrmax, yarn.description, yarn.lpg, owns.amount FROM owns JOIN yarn ON owns.yarn = yarn.yarn_id WHERE owns.owner = ?";
    $query = getTietokantayhteys()->prepare($sql);
    $query->execute(array($this->user_id));

    $ret = array();
    foreach($query->fetchAll(PDO::FETCH_OBJ) as $res) {
      $yarn = new Yarn($res->yarn_id, $res->yarnname, $res->yarnmanu, $res->nsrmin, $res->nsrmax, $res->description, $res->lpg);
      $ret[] = array('yarn' => $yarn, 'amount' => $res->amount);
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