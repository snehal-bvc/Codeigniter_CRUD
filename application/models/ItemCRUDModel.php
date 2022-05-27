<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    
class ItemCRUDModel extends CI_Model{

    public function __construct(){
        $this->load->database();
    }

    var $table = "items";  
    var $select_column = array("id", "title", "description");  
    var $order_column = array(null, "title", "description", null);  

    public function get_itemCRUD(){
        // if(!empty($this->input->get("search"))){
        //   $this->db->like('title', $this->input->get("search"));
        //   $this->db->or_like('description', $this->input->get("search")); 
        // }
        // print_r("hhhh");
        // exit;
        $query = $this->db->get("items");
       
        return $query->result();
    }


    public function insert_item()
    {    
        $data = array(
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description')
        );
        return $this->db->insert('items', $data);
    }


    public function update_item($id) 
    {
    //     print_r("hh");
    //   exit;
        $data=array(
            'id' => $this->input->post('id'),
            'title' => $this->input->post('title'),
            'description'=> $this->input->post('description')
        );
        if($id==0){
            return $this->db->insert('items',$data);
        }else{
            $this->db->where('id',$id);
            return $this->db->update('items',$data);
        }        
    }


    public function find_item($id)
    {
        return $this->db->get_where('items', array('id' => $id))->row();
    }






    function make_query()  
    {  
         $this->db->select($this->select_column);  
         $this->db->from($this->table); 

         if(isset($_POST["search"]["value"]))  
         {  
              $this->db->like("title", $_POST["search"]["value"]);  
              $this->db->or_like("description", $_POST["search"]["value"]);  
         } 

        //  if(isset($_POST["order"]))  
        //  {  
        //       $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
        //  }  

        //  else  
        //  {  
              $this->db->order_by('id', 'ASC');  
        //  }  
    }  

    function make_datatables()
    {  
        $this->make_query();  
        if($_POST["length"] != -1)  
        {  
             $this->db->limit($_POST['length'], $_POST['start']);  
        }  
        $query = $this->db->get();  
        return $query->result();  
    }  

    function get_filtered_data()
    {  
        $this->make_query(); 
        $query = $this->db->get(); 
        return $query->num_rows();  
    }  

    function get_all_data()  
    {  
         $this->db->select("*");  
         $this->db->from($this->table);  
         return $this->db->count_all_results();  
    }  







    public function delete_item($id)
    {
        return $this->db->delete('items', array('id' => $id));
    }
}
?>