<?php

class Yarn {
  
  private $yarn_id;
  private $yarnname;
  private $yarnmanu;
  private $nsrmin;
  private $nsrmax;
  private $description;
  private $lpg;

  public function __construct($yarn_id, $yarnname, $yarnmanu, $nsrmin, $nsrmax, $description, $lpg) {
    $this->yarn_id = trim($yarn_id);
    $this->yarnname = trim($yarnname);
    $this->yarnmanu = trim($yarnmanu);
    $this->nsrmin = trim($nsrmin*0.1);
    $this->nsrmax = trim($nsrmax*0.1);
    $this->description = trim($description);
    $this->lpg = trim($lpg);
  }

  public function getId() { return $this->yarn_id; }
  public function getYarnname() { return $this->yarnname; }
  public function getNsrmin() { return $this->nsrmin; }
  public function getNsrmax() { return $this->nsrmax; }
  public function getLpg() { return $this->lpg; }
  public function getDescription() { return $this->description; }
  public function getYarnmanu() { return $this->yarnmanu; }

  public static function getYarnById($id) {
    $sql = "SELECT * FROM yarn WHERE yarn_id = ? LIMIT 1";
    $query = getTietokantayhteys()->prepare($sql);
    $query->execute(array($id));

    $res = $query->fetchObject();
    if ($res == NULL){
      return NULL;
    } else {
      return new Yarn($res->yarn_id, $res->yarnname, $res->yarnmanu, $res->nsrmin, $res->nsrmax, $res->description, $res->lpg);
    }
  }

  public function setAttributes($attrs) {
    $sql = 'DELETE FROM yarnattr WHERE yarn = ?';
    $query = getTietokantayhteys()->prepare($sql);
    $query->execute(array($this->yarn_id));

    foreach ($attrs as $attr) {
      $sql = 'INSERT INTO yarnattr (yarn, attr) VALUES (?, ?)';
      $query = getTietokantayhteys()->prepare($sql);
      $query->execute(array($this->yarn_id, $attr->getId()));
    }
  }  

  public function listAttributes() {
    $sql = 'SELECT * FROM yarnattr LEFT JOIN attr ON attr.attr_id = yarnattr.attr WHERE yarnattr.yarn = ?';
    $query = getTietokantayhteys()->prepare($sql);
    $query->execute(array($this->yarn_id));

    $ret = array();
    foreach($query->fetchAll(PDO::FETCH_OBJ) as $res) {
      $attr = new Attr($res->attr_id, $res->attrname);
      $ret[] = $attr;
    }

    return $ret;
  }

  public static function listYarns() {
    $sql = 'SELECT * FROM yarn ORDER BY yarnname ASC';
    $query = getTietokantayhteys()->prepare($sql);
    $query->execute(array());

    $ret = array();
    foreach($query->fetchAll(PDO::FETCH_OBJ) as $res) {
      $yarn = new Yarn($res->yarn_id, $res->yarnname, $res->yarnmanu, $res->nsrmin, $res->nsrmax, $res->description, $res->lpg);
      $ret[] = $yarn;
    }

    return $ret;
  }

  public static function listYarnsWithManus() {
    $sql = 'SELECT * FROM yarn LEFT JOIN manu ON yarn.yarnmanu = manu.manu_id ORDER BY yarnname ASC';
    $query = getTietokantayhteys()->prepare($sql);
    $query->execute(array());

    $ret = array();
    foreach($query->fetchAll(PDO::FETCH_OBJ) as $res) {
      $yarn = new Yarn($res->yarn_id, $res->yarnname, $res->yarnmanu, $res->nsrmin, $res->nsrmax, $res->description, $res->lpg);
      $manu = $res->manu_id == NULL ? NULL : new Manu($res->manu_id, $res->manuname);
      $ret[] = array('yarn' => $yarn, 'manu' => $manu);
    }

    return $ret;
  }


  public static function addYarn($yarnname, $yarnmanu, $nsrmin, $nsrmax, $lpg, $description) {
    $sql = "INSERT INTO yarn (yarnname, yarnmanu, nsrmin, nsrmax, lpg, description) VALUES (?, ?, ?, ?, ?, ?) RETURNING yarn_id";
    $query = getTietokantayhteys()->prepare($sql);
    $query->execute(array(trim($yarnname), $yarnmanu, (int) 10*$nsrmin, (int) 10*$nsrmax, $lpg, trim($description)));
    $ret = $query->fetchObject();
    return $ret->yarn_id;
  }

  public static function updateYarn($yarn_id, $yarnname, $yarnmanu, $nsrmin, $nsrmax, $lpg, $description) {
    $sql = "UPDATE yarn SET (yarnname, yarnmanu, nsrmin, nsrmax, lpg, description) = (?, ?, ?, ?, ?, ?) WHERE yarn_id = ?";
    $query = getTietokantayhteys()->prepare($sql);
    $query->execute(array(trim($yarnname), $yarnmanu, (int) 10*$nsrmin, (int) 10*$nsrmax, $lpg, trim($description), (int) $yarn_id));
  }

  public static function deleteYarn($yarn_id) {
    $sql = "DELETE FROM yarn WHERE yarn_id = ?";
    $query = getTietokantayhteys()->prepare($sql);
    $query->execute(array($yarn_id));
  }

}