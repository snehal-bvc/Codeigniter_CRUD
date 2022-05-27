<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ItemCRUD extends CI_Controller {


   public $itemCRUD;


   /**
    * Get All Data from this method.
    *
    * @return Response
   */
   public function __construct() {
      parent::__construct(); 
      $this->load->library('form_validation');
      $this->load->library('session');
    //   $this->load->database();
      $this->load->model('ItemCRUDModel');

      $this->serverobj = new ItemCRUDModel;


      // $this->itemCRUD = new ItemCRUDModel;
   }


   /**
    * Display Data this method.
    *
    * @return Response
   */
   public function index()
   {
      // $data['data'] = $this->serverobj->get_itemCRUD();
      //  $this->load->view('theme/header');       
      //  $this->load->view('itemCRUD/list',$data);
      //  $this->load->view('theme/footer');

            $data['data'] = $this->serverobj->get_itemCRUD();
            $views = "itemCRUD/list";
            $this->load->view('main',array('views'=>$views,"data" =>$data));


   }


public function get_items()
{
   // print_r("hh");
   // exit;
   // $this->load->model('itemCRUDModel');
   
   $fetch_data = $this->serverobj->make_datatables(); 
   // echo '<pre>';
   // print_r($fetch_data);
   // exit; 
   $data = array();  

   foreach($fetch_data as $row)  
   {  
        $sub_array = array();  
        $sub_array[] = $row->id;  
        $sub_array[] = $row->title;  
        $sub_array[] = $row->description;  
        $sub_array[] =

       '<div class="icon">
        <form method="post" action="'.base_url('itemCRUD_delete/'.$row->id).'">
          <a class="btn btn-info" href="'.base_url('itemCRUD_show/'.$row->id).'"> show</a>
          <a class="btn btn-primary" href="'.base_url('itemCRUD_edit/'.$row->id).'"> Edit</a>
          <button type="submit" class="btn btn-danger"> Delete</button>
        </form>
        </div>' ;
      //   $sub_array[] = $row->description;  
        $data[] = $sub_array;  
   } 
   // print_r($this->itemCRUDModel->get_filtered_data());
   // exit; 

   $output = array(  
        "draw"                    =>     intval($_POST["draw"]),  
        "recordsTotal"            =>     $this->serverobj->get_all_data(),  
        "recordsFiltered"         =>     $this->serverobj->get_filtered_data(),  
        "data"                    =>     $data  
   ); 

   echo json_encode($output);  
}  

   /**
    * Show Details this method.
    *
    * @return Response
   */
   public function show($id)
   {
      // $item = $this->serverobj->find_item($id); 
      // $this->load->view('theme/header');
      // $this->load->view('itemCRUD/show',array('item'=>$item));
      // $this->load->view('theme/footer');

      $data['data'] = $this->serverobj->find_item($id);
      $views = "itemCRUD/show";
      $this->load->view('main',array('views'=>$views,"data" =>$data));
   
   }


   /**
    * Create from display on this method.
    *
    * @return Response
   */
   public function create()
   {
      // $this->load->view('theme/header');
      // $this->load->view('itemCRUD/create');
      // $this->load->view('theme/footer'); 
      
      $views = "itemCRUD/create";

      $this->load->view('main',array('views'=>$views));
   }


   /**
    * Store Data from this method.
    *
    * @return Response
   */
   public function store()
   {
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');

        if ($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('errors', validation_errors());
            redirect(base_url('itemCRUD_create'));
        }else{
         $this->serverobj->insert_item();
         // $this->load->model('itemCRUDModel');
         //   $this->itemCRUDModel->insert_item();
           redirect(base_url('itemCRUD'));
        }
    }


   // /**
   //  * Edit Data from this method.
   //  *
   //  * @return Response
   // */
   public function edit($id)
   {
   //  $this->load->model('itemCRUDModel');

   //     $item = $this->itemCRUDModel->find_item($id);

   //     $this->load->view('theme/header');
   //     $this->load->view('itemCRUD/edit',array('item'=>$item));
   //     $this->load->view('theme/footer');
   

   $data['data'] = $this->serverobj->find_item($id);
   $views = "itemCRUD/edit";
   $this->load->view('main',array('views'=>$views,"data" =>$data));


   }


   // /**
   //  * Update Data from this method.
   //  *
   //  * @return Response
   // */
   public function update($id)
   {
      // print_r("hh");
      // exit;
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');


        if ($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('errors', validation_errors());
            redirect(base_url('itemCRUD_edit/'.$id));
        }else{ 
         $this->load->model('itemCRUDModel');
          $this->itemCRUDModel->update_item($id);
          redirect(base_url('itemCRUD'));
        }
   }


   // /**
   //  * Delete Data from this method.
   //  *
   //  * @return Response
   // */
   public function delete($id)
   {
      $this->load->model('itemCRUDModel');
       $item = $this->itemCRUDModel->delete_item($id);
       redirect(base_url('itemCRUD'));
   }
}
