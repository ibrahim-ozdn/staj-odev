<?php

class Members extends CI_Controller
{
    public $viewFolder = "";

    public function __construct()
    {
        parent::__construct();

        $this->viewFolder = "members_view";
        $this->load->model("members_model");

        if(!get_active_user()){
            redirect(base_url("login"));
        }
    }

    public function index(){

        $viewData = new stdClass();

        $items = $this->members_model->get_all(
            array()
        );
        $this->load->helper("text");

        $viewData->viewFolder    = $this->viewFolder;
        $viewData->pageTitle     = "Subscribers";
        $viewData->subViewFolder = "list";
        $viewData->items = $items;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function delete($id){

        $delete = $this->members_model->delete(
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
        redirect(base_url("members"));
    }

    public function isActiveSetter($id){

        if($id){

            $isActive = ($this->input->post("data") === "true") ? 1 : 0;

            $this->members_model->update(
                array(
                    "id" => $id
                ),
                array(
                    "isActive" => $isActive
                )
            );
        }
    }
}