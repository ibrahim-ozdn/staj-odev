<?php

class Team_member extends CI_Controller
{
    public $viewFolder = "";

    public function __construct()
    {
        parent::__construct();

        $this->viewFolder = "team_member_view";
        $this->load->model("team_member_model");

        if(!get_active_user()){
            redirect(base_url("login"));
        }
    }

    public function index(){

        $viewData = new stdClass();

        $items = $this->team_member_model->get_all(
            array(), "rank ASC"
        );
        $this->load->helper("text");

        $viewData->viewFolder    = $this->viewFolder;
        $viewData->pageTitle     = "Team Members";
        $viewData->subViewFolder = "list";
        $viewData->items = $items;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function new_form(){

        $viewData = new stdClass();

        $viewData->viewFolder    = $this->viewFolder;
        $viewData->pageTitle     = "Add Team Member";
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
            redirect(base_url("team_member/new_form"));

            die();
        }

        $this->form_validation->set_rules("title", "Full Name", "required|trim");

        $this->form_validation->set_message(
            array(
                "required" => "{field} are field cannot be left blank!"
            )
        );

        $validate = $this->form_validation->run();

        if($validate){

            $file_name = convertToSEO(pathinfo($_FILES["img_url"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["img_url"]["name"], PATHINFO_EXTENSION);

            $config["allowed_types"] = "jpg|jpeg|png";
            $config["upload_path"]   = "uploads/$this->viewFolder/";
            $config["file_name"]     = $file_name;

            $this->load->library("upload", $config);

            $upload = $this->upload->do_upload("img_url");

            if($upload){

                $uploaded_file = $this->upload->data("file_name");

                $insert = $this->team_member_model->add(
                    array(
                        "title"         => $this->input->post("title"),
                        "designation"   => $this->input->post("designation"),
                        "phone_number"  => $this->input->post("phone_number"),
                        "email"         => $this->input->post("email"),
                        "website"       => $this->input->post("website"),
                        "account_icon1" => $this->input->post("account_icon1"),
                        "account_link1" => $this->input->post("account_link1"),
                        "account_icon2" => $this->input->post("account_icon2"),
                        "account_link2" => $this->input->post("account_link2"),
                        "description"   => $this->input->post("description"),
                        "slug"          => convertToSEO($this->input->post("title")),
                        "img_url"       => $uploaded_file,
                        "rank"          => 0,
                        "isActive"      => 1,
                        "createdAt"     => date("Y-m-d H:i:s")
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
                redirect(base_url("team_member/new_form"));

                die();
            }

            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("team_member"));

        } else {

            $viewData = new stdClass();

            $viewData->viewFolder    = $this->viewFolder;
            $viewData->pageTitle     = "Add Team Member";
            $viewData->subViewFolder = "add";
            $viewData->form_error    = true;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }

    public function update_form($id){

        $viewData = new stdClass();

        $item = $this->team_member_model->get(
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

        $this->form_validation->set_rules("title", "Full Name", "required|trim");

        $this->form_validation->set_message(
            array(
                "required" => "{field} are field cannot be left blank!"
            )
        );

        $validate = $this->form_validation->run();

        if($validate){

            if($_FILES["img_url"]["name"] !== "") {

                $file_name = convertToSEO(pathinfo($_FILES["img_url"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["img_url"]["name"], PATHINFO_EXTENSION);

                $config["allowed_types"] = "jpg|jpeg|png";
                $config["upload_path"]   = "uploads/$this->viewFolder/";
                $config["file_name"]     = $file_name;

                $this->load->library("upload", $config);

                $upload = $this->upload->do_upload("img_url");

                if ($upload) {

                    $uploaded_file = $this->upload->data("file_name");

                    $data = array(
                        "title"         => $this->input->post("title"),
                        "designation"   => $this->input->post("designation"),
                        "phone_number"  => $this->input->post("phone_number"),
                        "email"         => $this->input->post("email"),
                        "website"       => $this->input->post("website"),
                        "account_icon1" => $this->input->post("account_icon1"),
                        "account_link1" => $this->input->post("account_link1"),
                        "account_icon2" => $this->input->post("account_icon2"),
                        "account_link2" => $this->input->post("account_link2"),
                        "description"   => $this->input->post("description"),
                        "slug"          => convertToSEO($this->input->post("title")),
                        "img_url"       => $uploaded_file,
                        "updatedAt"     => date("Y-m-d H:i:s")
                    );

                } else {

                    $alert = array(
                        "title" => "Unsuccessful",
                        "text"  => "There was a problem loading the image.",
                        "type"  => "error"
                    );

                    $this->session->set_flashdata("alert", $alert);
                    redirect(base_url("team_member/update_form/$id"));

                    die();
                }

            } else {

                $data = array(
                    "title"         => $this->input->post("title"),
                    "designation"   => $this->input->post("designation"),
                    "phone_number"  => $this->input->post("phone_number"),
                    "email"         => $this->input->post("email"),
                    "website"       => $this->input->post("website"),
                    "account_icon1" => $this->input->post("account_icon1"),
                    "account_link1" => $this->input->post("account_link1"),
                    "account_icon2" => $this->input->post("account_icon2"),
                    "account_link2" => $this->input->post("account_link2"),
                    "description"   => $this->input->post("description"),
                    "slug"          => convertToSEO($this->input->post("title")),
                    "updatedAt"     => date("Y-m-d H:i:s")
                );
            }

            $update = $this->team_member_model->update(array("id" => $id), $data);

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
            redirect(base_url("team_member"));

        } else {

            $viewData = new stdClass();

            $viewData->viewFolder    = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error    = true;

            $viewData->item = $this->team_member_model->get(
                array(
                    "id" => $id,
                )
            );

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }

    public function delete($id){

        $fileName = $this->team_member_model->get(
            array(
                "id" => $id
            )
        );

        $delete = $this->team_member_model->delete(
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
        unlink("uploads/{$this->viewFolder}/$fileName->img_url");
        redirect(base_url("team_member"));
    }

    public function isActiveSetter($id){

        if($id){

            $isActive = ($this->input->post("data") === "true") ? 1 : 0;

            $this->team_member_model->update(
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

            $this->team_member_model->update(
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