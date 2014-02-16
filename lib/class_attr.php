<?php

class Attr {
      private $attr_id;
      private $attrname;

  public function __construct($attr_id, $attrname) {
    $this->attr_id = trim($attr_id);
    $this->attrname = trim($attrname);
  }

  public function getId() { return $this->attr_id; }
  public function getAttrname() { return $this->attrname; }

  public static function listAttrs() {
    $sql = 'SELECT * FROM attr';
    $query = getTietokantayhteys()->prepare($sql);
    $query->execute(array());

    $ret = array();
    foreach($query->fetchAll(PDO::FETCH_OBJ) as $res) {
      $attr = new Attr($res->attr_id, $res->attrname);
      $ret[] = $attr;
    }

    return $ret;
  }


}