<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model
{
 
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
 
    public function validate_user($data) {
        $this->db->where('email', $data['email']);
        $this->db->where('password', md5($data['password']));
        return $this->db->get('login')->row();
    }
 
    function __destruct() {
        $this->db->close();
    }
}