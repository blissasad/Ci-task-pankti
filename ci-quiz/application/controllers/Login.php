<?php  
defined('BASEPATH') OR exit('No direct script access allowed');  
  
class Login extends CI_Controller 
{    
    public function index()  
    {  
        $this->load->view('login_view'); 

        if($this->input->server("REQUEST_METHOD")==="POST")
    { 
          $email= $this->input->post("email");
      $password = $this->input->post("password");
      $user = $this->login_model->login_data($email,$password);
      $this->load->library('session');
      if($user)
      {
              $userdata = array(
                'id' => $user->id,
                'username' => $user->username,
                'email' => $user->email
              );
            $this->session->set_userdata($userdata);
      $this->session->set_flashdata('message', 'success ');
            redirect('quiz/game');
      }
      else
      {
      $this->session->set_flashdata('message', 'Invalid email or password');
            redirect('login');
      }         
    } 
    $this->load->view($page,$data);

    }  
  }  
?>