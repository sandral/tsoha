<?php

class User {
  
  private $user_id;
  private $username;
  private $password;
  private $admin;

  public function __construct($user_id, $username, $password, $admin = 0) {
    $this->user_id = $user_id;
    $this->username = trim($username);
    $this->password = $password;
    $this->admin = $admin;
  }

  public function passwordis($pwd) {
    return hash('sha256',$pwd) == $this->password;
  }

  public function getUsername() {
    return $this->username;
  }

  public function isAdmin() {
    return $this->admin;
  }
  public function changePwd($password) {
    $sql = 'UPDATE users SET password = ? WHERE user_id = ?';
    $query = getTietokantayhteys()->prepare($sql);
    $query->execute(array(hash('sha256', $password), $this->user_id));   
  }

  public static function addUser($username, $password, $isadmin) {
    $sql = "INSERT INTO users (username, password, isadmin) VALUES (?, ?, ?)";
    $query = getTietokantayhteys()->prepare($sql);
    $query->execute(array(trim($username), hash('sha256', $password), (int) isadmin));
    }

  public function owns($yarn_id) {
    $sql = 'SELECT count(*) as rows FROM owns WHERE yarn = ? AND owner = ?';
    $query = getTietokantayhteys()->prepare($sql);
    $query->execute(array($yarn_id, $this->user_id));

    $result = $query->fetchObject();
    return $result->rows > 0;
  }

  public function insertOwns($yarn_id, $amount) {
    $sql = 'INSERT INTO owns (yarn, owner, amount) VALUES (?, ?, ?)';
    $query = getTietokantayhteys()->prepare($sql);
    $query->execute(array($yarn_id, $this->user_id, $amount)); 	 
  }

  public function updateOwns($yarn_id, $amount) {
    $sql = 'UPDATE owns SET (amount) = (?) WHERE yarn = ? AND owner = ?';
    $query = getTietokantayhteys()->prepare($sql);
    $query->execute(array($amount, $yarn_id, $this->user_id)); 
  }

  public function deleteOwns($yarn_id) {
    $sql = 'DELETE FROM owns WHERE yarn = ? AND owner = ?';
    $query = getTietokantayhteys()->prepare($sql);
    $query->execute(array($yarn_id, $this->user_id)); 
  }

  public function getOwned() {

    $sql = "SELECT yarn.yarn_id, yarn.yarnname, yarn.yarnmanu, yarn.nsrmin, yarn.nsrmax,
      yarn.description, yarn.lpg, owns.amount, manu.manu_id, manu.manuname FROM
      (owns LEFT JOIN yarn ON owns.yarn = yarn.yarn_id) LEFT JOIN manu ON yarn.yarnmanu = manu.manu_id
      WHERE owns.owner = ? ORDER BY yarn.yarnname ASC";

    $query = getTietokantayhteys()->prepare($sql);

    $query->execute(array($this->user_id));

    $ret = array();
    foreach($query->fetchAll(PDO::FETCH_OBJ) as $res) {
      $yarn = new Yarn($res->yarn_id, $res->yarnname, $res->yarnmanu, $res->nsrmin, $res->nsrmax, $res->description, $res->lpg);
      $manu = new Manu($res->manu_id, $res->manuname);
      $ret[] = array('yarn' => $yarn, 'amount' => $res->amount, 'manu' => $manu);
    }

    return $ret;

  }  

  public function amount($yarn_id) {

    $sql = "SELECT owns.amount FROM owns WHERE owns.owner = ? AND owns.yarn = ? LIMIT 1";
    $query = getTietokantayhteys()->prepare($sql);
    $query->execute(array($this->user_id, $yarn_id));

    $result = $query->fetchObject();

    return $result->amount;

  }

  public static function getUserByUsername($user, $password) {
    $sql = 'SELECT user_id, username, password, isadmin FROM users WHERE username = ? AND password = ? LIMIT 1';
    $query = getTietokantayhteys()->prepare($sql);
    $query->execute(array($user, hash('sha256', $password)));

    $result = $query->fetchObject();
    if ($result == null) {
      return null;
    } else {
      $user = new User($result->user_id, $result->username, $result->password, $result->isadmin);
      return $user;
    }
  }
}