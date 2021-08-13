<?php

class Menu extends CI_Controller
{
    public $viewFolder = "";

    public function __construct()
    {
        parent::__construct();

        $this->viewFolder = "menu_view";
        $this->load->model("menu_model");

        if(!get_active_user()){
            redirect(base_url("login"));
        }
    }

    public function index(){

        $viewData = new stdClass();

        $items = $this->menu_model->get_all(
            array(), "rank ASC"
        );
        $this->load->helper("text");

        $viewData->viewFolder    = $this->viewFolder;
        $viewData->pageTitle     = "Menus";
        $viewData->subViewFolder = "list";
        $viewData->items = $items;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function new_form(){

        $viewData = new stdClass();

        $viewData->viewFolder    = $this->viewFolder;
        $viewData->pageTitle     = "Add Menu";
        $viewData->subViewFolder = "add";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function save(){

        $this->load->library("form_validation");
        $this->form_validation->set_rules("title", "Menu Name", "required|trim");

        $this->form_validation->set_message(
            array(
                "required" => "{field} are field cannot be left blank!"
            )
        );

        $validate = $this->form_validation->run();

        if($validate){

            $insert = $this->menu_model->add(
                array(
                    "title"     => $this->input->post("title"),
                    "link"      => $this->input->post("link"),
                    "slug"      => convertToSEO($this->input->post("title")),
                    "rank"      => 0,
                    "isActive"  => 1,
                    "createdAt" => date("Y-m-d H:i:s")
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
            redirect(base_url("menu"));

        } else {

            $viewData = new stdClass();

            $viewData->viewFolder    = $this->viewFolder;
            $viewData->pageTitle     = "Add Menu";
            $viewData->subViewFolder = "add";
            $viewData->form_error    = true;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }

    public function update_form($id){

        $viewData = new stdClass();

        $item = $this->menu_model->get(
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
        $this->form_validation->set_rules("title", "Menu Name", "required|trim");

        $this->form_validation->set_message(
            array(
                "required" => "{field} are field cannot be left blank!"
            )
        );

        $validate = $this->form_validation->run();

        if($validate){

            $update = $this->menu_model->update(
                array(
                    "id" => $id
                ),
                array(
                    "title"     => $this->input->post("title"),
                    "link"      => $this->input->post("link"),
                    "slug"      => convertToSEO($this->input->post("title")),
                    "updatedAt" => date("Y-m-d H:i:s")
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
            redirect(base_url("menu"));

        } else {

            $viewData = new stdClass();

            $item = $this->menu_model->get(
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

    public function delete($id){

        $delete = $this->menu_model->delete(
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
        redirect(base_url("menu"));
    }

    public function isActiveSetter($id){

        if($id){

            $isActive = ($this->input->post("data") === "true") ? 1 : 0;

            $this->menu_model->update(
                array(
                    "id" => $id
                ),
                array(
                    "isActive" => $isActive
                )
            );
        }
    }

    public function rankSetter(){

        $data = $this->input->post("data");
        parse_str($data, $order);

        $items = $order["ord"];

        foreach ($items as $rank => $id){

            $this->menu_model->update(
                array(
                    "id"      => $id,
                    "rank !=" => $rank
                ),
                array(
                    "rank" => $rank
                )
            );
        }
    }  
}