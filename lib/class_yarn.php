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
    $this->yarn_id = $yarn_id;
    $this->yarnname = $yarnname;
    $this->yarnmanu = $yarnmanu;
    $this->nsrmin = $nsrmin*0.1;
    $this->nsrmax = $nsrmax*0.1;
    $this->description = $description;
    $this->lpg = $lpg;
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

}