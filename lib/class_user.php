<?php
class Kayttaja {
  
  private $user_id;
  private $username;
  private $password;

  public function __construct($user_id, $username, $password) {
    $this->user_id = $user_id;
    $this->username = $username;
    $this->password = $password;
  }
  /* Tähän gettereitä ja settereitä */
}