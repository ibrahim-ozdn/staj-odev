<?php

class Hero extends CI_Controller
{
    public $viewFolder = "";

    public function __construct()
    {
        parent::__construct();

        $this->viewFolder = "hero_view";
        $this->load->model("hero_model");

        if(!get_active_user()){
            redirect(base_url("login"));
        }
    }

    public function index(){

        $viewData = new stdClass();

        $item = $this->hero_model->get();

        $this->load->helper("text");

        if($item)
            $viewData->subViewFolder = "update";
        else
            $viewData->subViewFolder = "no_content";

        $viewData->viewFolder = $this->viewFolder;
        $viewData->pageTitle  = "Hero Area Settings";
        $viewData->item = $item;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function new_form(){

        $viewData = new stdClass();

        $viewData->viewFolder    = $this->viewFolder;
        $viewData->pageTitle     = "Add Hero Section";
        $viewData->subViewFolder = "add";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function save(){

        $this->load->library("form_validation");

        if($_FILES["img_url"]["name"] == ""){

            $alert = array(
                "title" => "Unsuccessful",
                "text"  => "Please select a picture!",
                "type"  => "error"
            );

            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("hero/new_form"));

            die();
        }

        $this->form_validation->set_rules("title", "Title", "required|trim");
        $this->form_validation->set_rules("button_title", "Button Text", "required|trim");

        $this->form_validation->set_message(
            array(
                "required" => "{field} are field cannot be left blank!"
            )
        );

        $validate = $this->form_validation->run();

        if($validate){

            $file_name = convertToSEO(pathinfo($_FILES["img_url"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["img_url"]["name"], PATHINFO_EXTENSION);

            $config["allowed_types"] = "jpg|jpeg|png|gif|svg";
            $config["upload_path"]   = "uploads/$this->viewFolder/";
            $config["file_name"]     = $file_name;

            $this->load->library("upload", $config);

            $upload = $this->upload->do_upload("img_url");

            if($upload){

                $uploaded_file = $this->upload->data("file_name");

                $insert = $this->hero_model->add(
                    array(
                        "title"        => $this->input->post("title"),
                        "description"  => $this->input->post("description"),
                        "button_title" => $this->input->post("button_title"),
                        "button_link"  => $this->input->post("button_link"),
                        "slug"         => convertToSEO($this->input->post("title")),
                        "img_url"      => $uploaded_file,
                        "createdAt"    => date("Y-m-d H:i:s")
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

            } else {

                $alert = array(
                    "title" => "Unsuccessful",
                    "text"  => "There was a problem loading the image.",
                    "type"  => "error"
                );

                $this->session->set_flashdata("alert", $alert);
                redirect(base_url("hero/new_form"));

                die();
            }

            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("hero"));

        } else {

            $viewData = new stdClass();

            $viewData->viewFolder    = $this->viewFolder;
            $viewData->pageTitle     = "Add Hero Section";
            $viewData->subViewFolder = "add";
            $viewData->form_error    = true;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }

    public function update_form($id){

        $viewData = new stdClass();

        $item = $this->hero_model->get(
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
        $this->form_validation->set_rules("button_title", "Button Text", "required|trim");

        $this->form_validation->set_message(
            array(
                "required" => "{field} are field cannot be left blank!"
            )
        );

        $validate = $this->form_validation->run();

        if($validate){

            if($_FILES["img_url"]["name"] !== "") {

                $file_name = convertToSEO(pathinfo($_FILES["img_url"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["img_url"]["name"], PATHINFO_EXTENSION);

                $config["allowed_types"] = "jpg|jpeg|png|gif|svg";
                $config["upload_path"]   = "uploads/$this->viewFolder/";
                $config["file_name"]     = $file_name;

                $this->load->library("upload", $config);

                $upload = $this->upload->do_upload("img_url");

                if ($upload) {

                    $uploaded_file = $this->upload->data("file_name");

                    $data = array(
                        "title"        => $this->input->post("title"),
                        "description"  => $this->input->post("description"),
                        "button_title" => $this->input->post("button_title"),
                        "button_link"  => $this->input->post("button_link"),
                        "slug"         => convertToSEO($this->input->post("title")),
                        "img_url"      => $uploaded_file,
                        "updatedAt"    => date("Y-m-d H:i:s")
                    );

                } else {

                    $alert = array(
                        "title" => "Unsuccessful",
                        "text"  => "There was a problem loading the image.",
                        "type"  => "error"
                    );

                    $this->session->set_flashdata("alert", $alert);
                    redirect(base_url("hero/update_form/$id"));

                    die();
                }

            } else {

                $data = array(
                    "title"        => $this->input->post("title"),
                    "description"  => $this->input->post("description"),
                    "button_title" => $this->input->post("button_title"),
                    "button_link"  => $this->input->post("button_link"),
                    "slug"         => convertToSEO($this->input->post("title")),
                    "updatedAt"    => date("Y-m-d H:i:s")
                );
            }

            $update = $this->hero_model->update(array("id" => $id), $data);

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
            redirect(base_url("hero"));

        } else {

            $viewData = new stdClass();

            $viewData->viewFolder    = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error    = true;

            $viewData->item = $this->hero_model->get(
                array(
                    "id" => $id,
                )
            );

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }
}