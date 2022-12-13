<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Model {
  public function __construct() 
  {
    parent::__construct();
    
    if($this->session->has_userdata('authenticated')) 
    {
      if($this->session->userdata('authenticated'))
      {
        // echo "You are user";
      }
    }
  }
}  