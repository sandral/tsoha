<?php

class User {
  
  private $user_id;
  private $username;
  private $password;
  private $admin;

  public function __construct($user_id, $username, $password, $admin = 0) {
    $this->user_id = $user_id;
    $this->username = $username;
    $this->password = $password;
    $this->admin = $admin;
  }

  public function getUsername() {
    return $this->username;
  }

  public function isAdmin() {
    return $this->admin;
  }

  public function getOwned() {

    $sql = "SELECT yarn.yarn_id, yarn.yarnname, yarn.yarnmanu, yarn.nsrmin, yarn.nsrmax, yarn.description, yarn.lpg, owns.amount FROM owns JOIN yarn ON owns.yarn = yarn.yarn_id WHERE owns.owner = ? ORDER BY yarn.yarnname ASC";
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
    $sql = 'SELECT user_id, username, password, isadmin FROM users WHERE username = ? AND password = ? LIMIT 1';
    $query = getTietokantayhteys()->prepare($sql);
    $query->execute(array($user, $password));

    $result = $query->fetchObject();
    if ($result == null) {
      return null;
    } else {
      $user = new User($result->user_id, $result->username, $result->password, $result->isadmin);
      return $user;
    }
  }
}