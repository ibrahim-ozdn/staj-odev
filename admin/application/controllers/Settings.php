<?php

class Settings extends CI_Controller
{
    public $viewFolder = "";

    public function __construct()
    {
        parent::__construct();

        $this->viewFolder = "settings_view";
        $this->load->model("settings_model");

        if(!get_active_user()){
            redirect(base_url("login"));
        }
    }

    public function index(){

        $viewData = new stdClass();

        $item = $this->settings_model->get();

        $this->load->helper("text");

        if($item)
            $viewData->subViewFolder = "update";
        else
            $viewData->subViewFolder = "no_content";

        $viewData->viewFolder = $this->viewFolder;
        $viewData->pageTitle  = "Website Settings";
        $viewData->item = $item;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function new_form(){

        $viewData = new stdClass();

        $viewData->viewFolder    = $this->viewFolder;
        $viewData->pageTitle     = "Add Setting";
        $viewData->subViewFolder = "add";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function save(){

        $this->load->library("form_validation");

        if($_FILES["logo"]["name"] == ""){

            $alert = array(
                "title" => "Unsuccessful",
                "text"  => "Please select a picture!",
                "type"  => "error"
            );

            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("settings/new_form"));

            die();
        }

        $this->form_validation->set_rules("company_name", "Company Name", "required|trim");
        $this->form_validation->set_rules("email", "Email Address", "required|trim|valid_email");

        $this->form_validation->set_message(
            array(
                "required" => "{field} are field cannot be left blank!"
            )
        );

        $validate = $this->form_validation->run();

        if($validate){

            $file_name = convertToSEO(pathinfo($_FILES["logo"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["logo"]["name"], PATHINFO_EXTENSION);

            $config["allowed_types"] = "jpg|jpeg|png";
            $config["upload_path"]   = "uploads/$this->viewFolder/";
            $config["file_name"]     = $file_name;

            $this->load->library("upload", $config);

            $upload = $this->upload->do_upload("logo");

            if($upload){

                $uploaded_file = $this->upload->data("file_name");

                $insert = $this->settings_model->add(
                    array(
                        "company_name"     => $this->input->post("company_name"),
                        "maps"             => $this->input->post("maps"),
                        "logo"             => $uploaded_file,
                        "address"          => $this->input->post("address"),
                        "phone_1"          => $this->input->post("phone_1"),
                        "phone_2"          => $this->input->post("phone_2"),
                        "fax_1"            => $this->input->post("fax_1"),
                        "fax_2"            => $this->input->post("fax_2"),
                        "email"            => $this->input->post("email"),
                        "view_website"     => $this->input->post("view_website"),
                        "footer_copyright" => $this->input->post("footer_copyright"),
                        "slug"             => convertToSEO($this->input->post("company_name")),
                        "createdAt"        => date("Y-m-d H:i:s")
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
                redirect(base_url("settings/new_form"));

                die();
            }

            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("settings"));

        } else {

            $viewData = new stdClass();

            $viewData->viewFolder    = $this->viewFolder;
            $viewData->pageTitle     = "Add Setting";
            $viewData->subViewFolder = "add";
            $viewData->form_error    = true;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }

    public function update_form($id){

        $viewData = new stdClass();

        $item = $this->settings_model->get(
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

        $this->form_validation->set_rules("company_name", "Company Name", "required|trim");
        $this->form_validation->set_rules("email", "Email Address", "required|trim|valid_email");

        $this->form_validation->set_message(
            array(
                "required" => "{field} are field cannot be left blank!"
            )
        );

        $validate = $this->form_validation->run();

        if($validate){

            if($_FILES["logo"]["name"] !== "") {

                $file_name = convertToSEO(pathinfo($_FILES["logo"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["logo"]["name"], PATHINFO_EXTENSION);

                $config["allowed_types"] = "jpg|jpeg|png";
                $config["upload_path"]   = "uploads/$this->viewFolder/";
                $config["file_name"]     = $file_name;

                $this->load->library("upload", $config);

                $upload = $this->upload->do_upload("logo");

                if ($upload) {

                    $uploaded_file = $this->upload->data("file_name");

                    $data = array(
                        "company_name"     => $this->input->post("company_name"),
                        "maps"             => $this->input->post("maps"),
                        "logo"             => $uploaded_file,
                        "address"          => $this->input->post("address"),
                        "phone_1"          => $this->input->post("phone_1"),
                        "phone_2"          => $this->input->post("phone_2"),
                        "fax_1"            => $this->input->post("fax_1"),
                        "fax_2"            => $this->input->post("fax_2"),
                        "email"            => $this->input->post("email"),
                        "view_website"     => $this->input->post("view_website"),
                        "footer_copyright" => $this->input->post("footer_copyright"),
                        "slug"             => convertToSEO($this->input->post("company_name")),
                        "updatedAt"        => date("Y-m-d H:i:s")
                    );

                } else {

                    $alert = array(
                        "title" => "Unsuccessful",
                        "text"  => "There was a problem loading the image.",
                        "type"  => "error"
                    );

                    $this->session->set_flashdata("alert", $alert);
                    redirect(base_url("settings/update_form/$id"));

                    die();
                }

            } else {

                $data = array(

                    "company_name"     => $this->input->post("company_name"),
                    "maps"             => $this->input->post("maps"),
                    "address"          => $this->input->post("address"),
                    "phone_1"          => $this->input->post("phone_1"),
                    "phone_2"          => $this->input->post("phone_2"),
                    "fax_1"            => $this->input->post("fax_1"),
                    "fax_2"            => $this->input->post("fax_2"),
                    "email"            => $this->input->post("email"),
                    "view_website"     => $this->input->post("view_website"),
                    "footer_copyright" => $this->input->post("footer_copyright"),
                    "slug"             => convertToSEO($this->input->post("company_name")),
                    "updatedAt"        => date("Y-m-d H:i:s")
                );
            }

            $update = $this->settings_model->update(array("id" => $id), $data);

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
            redirect(base_url("settings"));

        } else {

            $viewData = new stdClass();

            $viewData->viewFolder    = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error    = true;

            $viewData->item = $this->settings_model->get(
                array(
                    "id" => $id,
                )
            );

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }
}