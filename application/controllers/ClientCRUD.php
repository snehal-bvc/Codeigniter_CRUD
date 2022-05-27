<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ClientCRUD extends CI_Controller {

    // public $clientCRUD;

    public function __construct() {
        parent::__construct(); 
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('ClientCRUDModel');
        $this->clientobj = new ClientCRUDModel;
       }

       public function dashboard()
       {
        $this->load->view('main');
       }

       public function index()
       {
          $data['data'] = $this->clientobj->get_clientCRUD();
        //    $this->load->view('theme/header');       
        //    $this->load->view('clientCRUD/list_client',$data);
           $views = "clientCRUD/list_client";

           $this->load->view('main',array('views'=>$views,"data" =>$data));

        //    $this->load->view('theme/footer');
       }

       public function get_data()
       {
             $draw   = intval($this->input->get("draw"));
             $start  = intval($this->input->get("start"));
             $length = intval($this->input->get("length"));
       
             $query = $this->db->get("client_data");
       
             $data = [];
       
             foreach($query->result() as $r) {
                  $data[] = array(
                       $r->id,
                       $r->name,
                       $r->addr,
                       $r->mobile,

                      '<div class="icon">
                       <form method="post" action="'.base_url('clientCRUD_delete/'.$r->id).'">
                         <a class="btn btn-info" href="'.base_url('clientCRUD_show/'.$r->id).'"> show</a>
                        <a class="btn btn-primary" href="'.base_url('clientCRUD_edit/'.$r->id).'"> Edit</a>
                         <button type="submit" class="btn btn-danger"> Delete</button>
                       </form>
                       </div>'
                  );
             }
       
             $result = array(
                      "draw" => $draw,
                        "recordsTotal" => $query->num_rows(),
                        "recordsFiltered" => $query->num_rows(),
                        "data" => $data
                   );
       
             echo json_encode($result);
             exit();
          }
       

          public function show($id)
          {
            // $item = $this->clientobj->find_client($id);
            //  $this->load->view('theme/header');
            //  $this->load->view('clientCRUD/show_client',array('item'=>$item));
            //  $this->load->view('theme/footer');

             $data['data'] = $this->clientobj->find_client($id);
             $views = "clientCRUD/show_client";
             $this->load->view('main',array('views'=>$views,"data" =>$data));
          
          }


          public function create()
          {
            //  $this->load->view('theme/header');
            //  $this->load->view('clientCRUD/create_client');
            //  $this->load->view('theme/footer');
            $views = "clientCRUD/create_client";

            $this->load->view('main',array('views'=>$views));
   
          }

          public function store()
          {
               $this->form_validation->set_rules('name', 'Name', 'required');
               $this->form_validation->set_rules('addr', 'Address', 'required');
               $this->form_validation->set_rules('mobile', 'Mobile', 'required');

       
               if ($this->form_validation->run() == FALSE){
                   $this->session->set_flashdata('errors', validation_errors());
                   redirect(base_url('clientCRUD_create'));
               }else{
                $this->clientobj->insert_client();
                  redirect(base_url('clientCRUD'));
               }
           }

           

           public function edit($id)
           {  
              //  $item = $this->clientobj->find_client($id);
              //  $this->load->view('theme/header');
              //  $this->load->view('clientCRUD/edit_client',array('item'=>$item));
              //  $this->load->view('theme/footer');
              $data['data'] = $this->clientobj->find_client($id);
              $views = "clientCRUD/edit_client";
              $this->load->view('main',array('views'=>$views,"data" =>$data));
           
           }
        
           public function update($id)
           {
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('addr', 'Address', 'required');
            $this->form_validation->set_rules('mobile', 'Mobile', 'required');
        
        
                if ($this->form_validation->run() == FALSE){
                    $this->session->set_flashdata('errors', validation_errors());
                    redirect(base_url('clientCRUD_edit/'.$id));
                }else{ 
                    $this->clientobj->update_client($id);
                  redirect(base_url('clientCRUD'));
                }
           }
        
             
           public function delete($id)
           {
            $this->clientobj->delete_client($id);
               redirect(base_url('clientCRUD'));
           }






}

