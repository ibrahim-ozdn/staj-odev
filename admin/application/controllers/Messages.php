<?php

class Messages extends CI_Controller
{
    public $viewFolder = "";

    public function __construct()
    {
        parent::__construct();

        $this->viewFolder = "messages_view";
        $this->load->model("messages_model");

        if(!get_active_user()){
            redirect(base_url("login"));
        }
    }

    public function index(){

        $viewData = new stdClass();

        $items = $this->messages_model->get_all(
            array()
        );
        $this->load->helper("text");

        $viewData->viewFolder    = $this->viewFolder;
        $viewData->pageTitle     = "Messages";
        $viewData->subViewFolder = "list";
        $viewData->items = $items;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function delete($id){

        $delete = $this->messages_model->delete(
            array(
                "id" => $id
            )
        );

        if($delete){

            $alert = array(
                "title" => "Successful",
                "text"  => "Registration successfully deleted.",
                "type"  => "success"
            );

        } else {

            $alert = array(
                "title" => "Unsuccessful",
                "text"  => "There was a problem deleting.",
                "type"  => "error"
            );
        }

        $this->session->set_flashdata("alert", $alert);
        redirect(base_url("messages"));
    }
}