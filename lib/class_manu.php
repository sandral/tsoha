<?php

class Manu {
  
  private $manu_id;
  private $manuname;

  public function __construct($manu_id, $manuname) {
    $this->manu_id = $manu_id;
    $this->manuname = $manuname;
  }

  public function getId() { return $this->manu_id; }
  public function getManuname() { return $this->manuname; }

  public static function listManus() {
    $sql = 'SELECT * FROM manu ORDER BY manuname ASC';
    $query = getTietokantayhteys()->prepare($sql);
    $query->execute(array());

    $ret = array();
    foreach($query->fetchAll(PDO::FETCH_OBJ) as $res) {
      $manu = new Manu($res->manu_id, $res->manuname);
      $ret[] = $manu;
    }

    return $ret;
  }

    public static function updateManu($manu_id, $manuname) {
    $sql = "UPDATE manu SET (manuname) = (?) WHERE manu_id = ?";
    $query = getTietokantayhteys()->prepare($sql);
    $query->execute(array(trim($manuname), (int) $manu_id));
  }

    public static function addManu($manuname) {
    $sql = "INSERT INTO manu (manuname) VALUES (?)";
    $query = getTietokantayhteys()->prepare($sql);
    $query->execute(array(trim($manuname)));
  }

    public static function deleteManu($manu_id) {
    $sql = "DELETE FROM manu WHERE manu_id = ?";
    $query = getTietokantayhteys()->prepare($sql);
    $query->execute(array($manu_id));
  }




  public static function getManuById($id) {
    $sql = "SELECT * FROM manu WHERE manu_id = ? LIMIT 1";
    $query = getTietokantayhteys()->prepare($sql);
    $query->execute(array($id));

    $res = $query->fetchObject();
    if ($res == NULL){
      return NULL;
    } else {
      return new Manu($res->manu_id, $res->manuname);
    }
  }

}