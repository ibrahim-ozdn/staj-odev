<?php

class Members_settings extends CI_Controller
{
    public $viewFolder = "";

    public function __construct()
    {
        parent::__construct();

        $this->viewFolder = "page_settings_view/members_settings_view";
        $this->load->model("members_settings_model");

        if(!get_active_user()){
            redirect(base_url("login"));
        }
    }

    public function index(){

        $viewData = new stdClass();

        $item = $this->members_settings_model->get();

        $this->load->helper("text");

        if($item)
            $viewData->subViewFolder = "update";
        else
            $viewData->subViewFolder = "no_content";

        $viewData->viewFolder = $this->viewFolder;
        $viewData->pageTitle  = "Subscribers Area Settings";
        $viewData->item = $item;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function new_form(){

        $viewData = new stdClass();

        $viewData->viewFolder    = $this->viewFolder;
        $viewData->pageTitle     = "Add Subscribe Section";
        $viewData->subViewFolder = "add";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function save(){

        $this->load->library("form_validation");
        $this->form_validation->set_rules("title", "Title", "required|trim");

        $this->form_validation->set_message(
            array(
                "required" => "{field} are field cannot be left blank!"
            )
        );

        $validate = $this->form_validation->run();

        if($validate){

            $insert = $this->members_settings_model->add(
                array(
                    "title"       => $this->input->post("title"),
                    "sub_title"   => $this->input->post("sub_title"),
                    "description" => $this->input->post("description"),
                    "createdAt"   => date("Y-m-d H:i:s")
                )
            );

            if($insert){

                $alert = array(
                    "title" => "Successful",
                    "text"  => "Registration successfully added.",
                    "type"  => "success"
                );

            } else {

                $alert = array(
                    "title" => "Unsuccessful",
                    "text"  => "There was a problem adding.",
                    "type"  => "error"
                );
            }

            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("members_settings"));

        } else {

            $viewData = new stdClass();

            $viewData->viewFolder    = $this->viewFolder;
            $viewData->pageTitle     = "Add Subscribe Section";
            $viewData->subViewFolder = "add";
            $viewData->form_error    = true;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }

    public function update_form($id){

        $viewData = new stdClass();

        $item = $this->members_settings_model->get(
            array(
                "id" => $id,
            )
        );
        $this->load->helper("text");

        $viewData->viewFolder    = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $item;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function update($id){

        $this->load->helper("text");

        $this->load->library("form_validation");
        $this->form_validation->set_rules("title", "Title", "required|trim");

        $this->form_validation->set_message(
            array(
                "required" => "{field} are field cannot be left blank!"
            )
        );

        $validate = $this->form_validation->run();

        if($validate){

            $update = $this->members_settings_model->update(
                array(
                    "id" => $id
                ),
                array(
                    "title"       => $this->input->post("title"),
                    "sub_title"   => $this->input->post("sub_title"),
                    "description" => $this->input->post("description"),
                    "updatedAt"   => date("Y-m-d H:i:s")
                )
            );

            if($update){

                $alert = array(
                    "title" => "Successful",
                    "text"  => "Registration successfully updated.",
                    "type"  => "success"
                );

            } else {

                $alert = array(
                    "title" => "Unsuccessful",
                    "text"  => "There was a problem updating.",
                    "type"  => "error"
                );
            }

            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("members_settings"));

        } else {

            $viewData = new stdClass();

            $item = $this->members_settings_model->get(
                array(
                    "id" => $id,
                )
            );

            $viewData->viewFolder    = $this->viewFolder;  
            $viewData->subViewFolder = "update";
            $viewData->form_error    = true;
            $viewData->item = $item;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }
}