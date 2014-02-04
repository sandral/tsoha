<?php

require_once 'lib/tietokantayhteys.php';

class Owns {
  
  private $owner;
  private $yarn;
  private $amount;

  public function __construct($owner, $yarn, $amount) {
    $this->owner = $owner;
    $this->yarn = $yarn;
    $this->amount = $amount;
  }

  public function getAmount() {
    return $this->amount;
  }
 
}
