<?php
/**
 * @package Contact :  CodeIgniter Contact Form
 *
 * @author TechArise Team
 *
 * @email  info@techarise.com
 *   
 * Description of Contact Controller
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Contact extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }
    // render contact form
    public function index() {
        $data['page'] = 'contact';
        $data['title'] = 'contact | TechArise';             
        $this->load->view('contact/index', $data);
    }
    
    // send information
    public function send() {
        // Load the email library
        $this->load->library('email');
        // Load the validation library
        $this->load->library('form_validation');

        // field name, error message, validation rules
        $this->form_validation->set_rules('name', 'Name', 'trim|required');     
        $this->form_validation->set_rules('email', 'Your Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('contact_no', 'Phone', 'trim|required');
        $this->form_validation->set_rules('comment', 'Comments', 'trim|required');
                   
        if($this->form_validation->run() == FALSE) {
          $this->index();
        } else {        
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $contact_no = $this->input->post('contact_no');
            $comment = $this->input->post('comment');            
            if(!empty($email)) {
                // send mail
                $config = array (
                  'mailtype' => 'html',
                  'charset'  => 'utf-8',
                  'priority' => '1'
                );
                $message='';
                $bodyMsg = '<p style="font-size:14px;font-weight:normal;margin-bottom:10px;margin-top:0;">'.$comment.'</p>';   
                $delimeter = $name."<br>".$contact_no;
                $dataMail = array('topMsg'=>'Hi Team', 'bodyMsg'=>$bodyMsg, 'thanksMsg'=>'Best regards,', 'delimeter'=> $delimeter);

                $this->email->initialize($config);
                $this->email->from($email, $name);
                $this->email->to(TO_MAIL);
                $this->email->subject('Contact Form');
                $message = $this->load->view('mailTemplate/contactForm', $dataMail, TRUE);
                $this->email->message($message);
                $this->email->send();

                // confirmation mail
                $bodyMsg = '<p style="font-size:14px;font-weight:normal;margin-bottom:10px;margin-top:0;">Thank you for contacting us.</p>';                 
                $dataMail = array('topMsg'=>'Hi '.$name, 'bodyMsg'=>$bodyMsg, 'thanksMsg'=>'Best regards,', 'delimeter'=> 'Team TechArise');

                $this->email->initialize($config);
                $this->email->from(TO_MAIL, FROM_TEXT);
                $this->email->to($email);
                $this->email->subject('Contact Form Confimation');
                $message = $this->load->view('mailTemplate/contactForm', $dataMail, TRUE);
                $this->email->message($message);
                $this->email->send();                
            }
            $this->session->set_flashdata('msg', 'Thank you for your message. It has been sent.');
            redirect('/');
        }
    }   

}