<?php

class Watch_video extends CI_Controller
{
    public $viewFolder = "";

    public function __construct()
    {
        parent::__construct();

        $this->viewFolder = "watch_video_view";
        $this->load->model("watch_video_model");

        if(!get_active_user()){
            redirect(base_url("login"));
        }
    }

    public function index(){

        $viewData = new stdClass();

        $item = $this->watch_video_model->get();

        $this->load->helper("text");

        if($item)
            $viewData->subViewFolder = "update";
        else
            $viewData->subViewFolder = "no_content";

        $viewData->viewFolder = $this->viewFolder;
        $viewData->pageTitle  = "Watch Video";
        $viewData->item = $item;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function new_form(){

        $viewData = new stdClass();

        $viewData->viewFolder    = $this->viewFolder;
        $viewData->pageTitle     = "Add Watch Video";
        $viewData->subViewFolder = "add";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function save(){

        $this->load->library("form_validation");
        $this->form_validation->set_rules("video_link", "Video Link", "required|trim");
        $this->form_validation->set_rules("icon", "Icon", "required|trim");

        $this->form_validation->set_message(
            array(
                "required" => "{field} are field cannot be left blank!"
            )
        );

        $validate = $this->form_validation->run();

        if($validate){

            $insert = $this->watch_video_model->add(
                array(
                    "video_link" => $this->input->post("video_link"),
                    "icon"       => $this->input->post("icon"),
                    "createdAt"  => date("Y-m-d H:i:s")
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
            redirect(base_url("watch_video"));

        } else {

            $viewData = new stdClass();

            $viewData->viewFolder    = $this->viewFolder;
            $viewData->pageTitle     = "Add Watch Video";
            $viewData->subViewFolder = "add";
            $viewData->form_error    = true;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }

    public function update_form($id){

        $viewData = new stdClass();

        $item = $this->watch_video_model->get(
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
        $this->form_validation->set_rules("video_link", "Video Link", "required|trim");
        $this->form_validation->set_rules("icon", "Icon", "required|trim");

        $this->form_validation->set_message(
            array(
                "required" => "{field} are field cannot be left blank!"
            )
        );

        $validate = $this->form_validation->run();

        if($validate){

            $update = $this->watch_video_model->update(
                array(
                    "id" => $id
                ),
                array(
                    "video_link" => $this->input->post("video_link"),
                    "icon"       => $this->input->post("icon"),
                    "updatedAt"  => date("Y-m-d H:i:s")
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
            redirect(base_url("watch_video"));

        } else {

            $viewData = new stdClass();

            $item = $this->watch_video_model->get(
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