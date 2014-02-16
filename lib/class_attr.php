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
    
  public static function addAttr($attrname) {
      $sql = 'INSERT INTO attr (attrname) VALUES (?)';
      $query = getTietokantayhteys()->prepare($sql);
      $query->execute(array(trim($attrname)));
    }
	 

    public static function updateAttr($attr_id, $attrname) {
    $sql = "UPDATE attr SET (attrname) = (?) WHERE attr_id = ?";
    $query = getTietokantayhteys()->prepare($sql);
    $query->execute(array(trim($attrname), (int) $attr_id));
  }
  

  public static function getAttrById($id) {
    $sql = "SELECT * FROM attr WHERE attr_id = ? LIMIT 1";
    $query = getTietokantayhteys()->prepare($sql);
    $query->execute(array($id));

    $res = $query->fetchObject();
    if ($res == NULL){
      return NULL;
    } else {
      return new Attr($res->attr_id, $res->attrname);
    }
  }

    public static function deleteAttr($attr_id) {
    $sql = "DELETE FROM attr WHERE attr_id = ?";
    $query = getTietokantayhteys()->prepare($sql);
    $query->execute(array($attr_id));
  }


}