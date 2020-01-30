<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->model('Settings_Model');
        $this->load->model('Contact_Model');
        
    }
    public function index() {
        $this->load->helper('form');
        $array=array('smtp_host'=>'smtp.gmail.com','smtp_port'=>'465',
        'smtp_user'=>'j4jatinder@gmail.com','smtp_pass'=>'H7DKWAST@j4jatinder');
       
        $smtp_host =$this->Settings_Model->getSetting('smtp_host'); 
        $this->load->view('email/contact',['smtp_host'=>$smtp_host ]);
    }
    public function send_mail() {
        
        $to_email = $this->input->post('to');
        $subject =$this->input->post('subject');
        $message =$this->input->post('message');
        if(empty($to_email)){
           // show_error('');
            $this->session->set_flashdata("email_sent","<p class='error'>Email cannot be blank!</p>");
            redirect("contact");
        }
        else{
        $row=['to_email'=>$to_email, 'subject'=>$subject, 'body'=>$message,'created'=>date('Y-m-d H:m:s') ];
        $insID = $this->Contact_Model->insertContact($row);
        $subject =$subject ?$subject : 'Contact US';
        $this->loadEmailer();
        $this->email->to($to_email);
        $this->email->subject($subject);
        $this->email->message($message);
        //Send mail
        if($this->email->send()){
            $this->session->set_flashdata("email_sent","<p class='success'>Congragulation Email Sent Successfully.</p>");
            redirect("contact");}
        else{
           // echo "<p class='error'>You have encountered an EROR</p>";
            show_error($this->email->print_debugger());
            $this->session->set_flashdata("email_sent","<p class='error'>You have encountered an error</p>");
        
        }
        }

        $smtp_host =$this->Settings_Model->getSetting('smtp_host'); 
        $this->load->view('email/contact',['smtp_host'=>$smtp_host ]);
    }
    
    private function loadEmailer(){


        $smtp_host =$this->Settings_Model->getSetting('smtp_host'); 
        $smtp_port =$this->Settings_Model->getSetting('smtp_port');
        $smtp_username =$this->Settings_Model->getSetting('smtp_username');
        $smtp_password =$this->Settings_Model->getSetting('smtp_password');
        $smtp_ssl =$this->Settings_Model->getSetting('smtp_ssl');
        $config = Array(
            'protocol' => 'smtp',
            'send_multipart'=>false,
            'smtp_host' => $smtp_host, // 'smtp.gmail.com',
            'smtp_port' => $smtp_port, //465,
            'smtp_user' => $smtp_username, //'j4jatinder@gmail.com', // change it to yours
            'smtp_pass' => $smtp_password, //'H7DKWAST@j4jatinder', // change it to yours
            'mailtype' => 'html',
            'newline'   => "\r\n",
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE, 
            'smtp_crypto' => $smtp_ssl,
            'crlf' => "\r\n",
          );
        $this->load->library('email', $config);
        $from_email =$smtp_username;// "j4jatinder@gmail.com";
        $this->email->from($from_email);
        
       }
        
    

}
