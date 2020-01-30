<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

	

	function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->model('Settings_Model');
        
    }
	public function smtp()
	{

        $smtp_host =$this->Settings_Model->getSetting('smtp_host'); 
        $smtp_port =$this->Settings_Model->getSetting('smtp_port');
        $smtp_username =$this->Settings_Model->getSetting('smtp_username');
		$smtp_password =$this->Settings_Model->getSetting('smtp_password');
		$smtp_ssl =$this->Settings_Model->getSetting('smtp_ssl');
		$settings['smtp_host']=$smtp_host;
		$settings['smtp_port']=$smtp_port;
		$settings['smtp_username']=$smtp_username;
		$settings['smtp_password']=$smtp_password;
		$settings['smtp_ssl']=$smtp_ssl;
		$this->load->view('settings/smtp_settings', array('settings'=>$settings ));
	}
	public function smtp_save()
	{
		foreach($this->input->post() as $k=>$v){

			$row=['value'=>$v ];
			$insID = $this->Settings_Model->updateSetting($row,['name'=>$k]);

		}

		$this->session->set_flashdata("Settings","<p class='success'>Congragulation SMTP Record Updated Successfully.</p>");
		redirect("smtp");
	}
}
