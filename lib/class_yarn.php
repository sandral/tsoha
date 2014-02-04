<?php

require_once 'lib/tietokantayhteys.php';

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
    $this->nsrmin = $nsrmin;
    $this->nsrmax = $nsrmax;
    $this->description = $description;
    $this->lpg = $lpg;
  }

  public function getYarnname() {
    return $this->yarnname;
  }

  public static function getYarnById($id) {
    $sql = "SELECT * FROM yarn WHERE yarn_id = ? LIMIT 1";
    $query = getTietokantayhteys()->prepare($sql);
    $query->execute($id);

    $res = $query->fetchObject();
    return new Yarn($res->yarn_id, $res->yarnname, $res->yarnmanu, $res->nsrmin, $res->nsrmax, $res->description, $res->lpg);
  }

}