<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class ClientCRUDModel extends CI_Model{

    public function __construct(){
        $this->load->database();
    }


    public function get_clientCRUD(){
        $query = $this->db->get("client_data");
        return $query->result();
    }

    public function find_client($id)
    {
        return $this->db->get_where('client_data', array('id' => $id))->row();
    }

    public function insert_client()
    {    
        $data = array(
            'name' => $this->input->post('name'),
            'addr' => $this->input->post('addr'),
            'mobile' => $this->input->post('mobile')

        );
        return $this->db->insert('client_data', $data);
    }


    public function update_client($id) 
    {
    //     print_r($id);
    //   exit;
        $data=array(
            'id' => $id,
            'name' => $this->input->post('name'),
            'addr'=> $this->input->post('addr'),
            'mobile'=> $this->input->post('mobile')

        );
        if($id==0){
            return $this->db->insert('client_data',$data);
        }else{
            $this->db->where('id',$id);
            return $this->db->update('client_data',$data);
        }        
    }


    public function delete_client($id)
    {
        return $this->db->delete('client_data', array('id' => $id));
    }












 }

?>