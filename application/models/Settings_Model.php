<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings_Model extends CI_Model {

    function insertSetting(){

    }
    function updateSetting($data,$where){
        return $this->db->update('general_settings',$data, $where);
     }
    function getSetting($name){
        $setting = $this->db->get_where('general_settings', array('name' => $name))->row();
      if($setting) { 
        
        return $setting->value;
    }else{
        return '';
    }
       
    }
    function getContacts(){
        $response = array();
        // Select record
        $this->db->select('*');
        $q = $this->db->get('sent_emails');
        $response = $q->result_array();
    
        return $response;
    }


}
