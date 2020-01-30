<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_Model extends CI_Model {

    function insertContact($data){
       return $this->db->insert('sent_emails',$data);
    }
    function updateContact($data,$where){
        return $this->db->insert('sent_emails',$data, $where);
     }
    function getContacts(){
        $response = array();
        $this->db->select('*');
        $q = $this->db->get('sent_emails');
        $response = $q->result_array();
        return $response;
    }

}
