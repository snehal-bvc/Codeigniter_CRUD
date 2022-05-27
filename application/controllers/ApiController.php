<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ApiController extends CI_Controller {


   public $apiController;


   /**
    * Get All Data from this method.
    *
    * @return Response
   */
   public function __construct() {
      parent::__construct(); 
      // $this->load->library('form_validation');
      // $this->load->library('session');
    //   $this->load->database();
      $this->load->model('ItemCRUDModel');
   }

// public function index_get()
// {
//     $data =new ItemCRUDModel;
//     $info= $data->get_itemCRUD();
//     $this->response($info,200);
// }

public function storedata()
{
    
    $data = $this->input->post();
    // print_r($data);
    // return $data;
    // exit;

    // $data =[
    //  'title' =>$this->input->post(),
    //  'description' =>$this->input->post('description'),
    // ];
    
//  $this->response($data,200);
// $this->json_encode($data);
}




}
