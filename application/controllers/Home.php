<?php

class Home extends CI_Controller {

    public $viewFolder = "";

    public function __construct()
    {
        parent::__construct();
        $this->load->helper("text");
    }

    public function index(){

        $viewData = new stdClass();

        $viewData->viewFolder = "home_view";


        $viewData->seos = $this->db->get("seo_settings")->result();


        $this->load->model("menu_model");

        $viewData->menus = $this->menu_model->get_all(
            array(
                "isActive"  => 1
            ), "rank ASC"
        );
        

        $viewData->heros = $this->db->get("hero")->result();


        $viewData->featuresSettings = $this->db->get("feature_settings")->result();

        $this->load->model("features_model");

        $viewData->features = $this->features_model->get_all(
            array(
                "isActive"  => 1
            ), "rank ASC", array("start" => 0, "count" => 6)
        );


        $viewData->watchVideos = $this->db->get("watch_video")->result();
        $viewData->watchvideoSettings = $this->db->get("watch_video_settings")->result();


        $viewData->counterVideos = $this->db->get("counter_settings")->result();

        $this->load->model("counter_model");

        $viewData->counters = $this->counter_model->get_all(
            array(
                "isActive"  => 1
            ), "rank ASC", array("start" => 0, "count" => 4)
        );

        
        $viewData->ScreenshotSettings = $this->db->get("screenshot_settings")->result();

        $this->load->model("screenshots_images_model");

        $viewData->screenshots = $this->screenshots_images_model->get_all(
            array(
                "isActive"  => 1
            ), "rank ASC"
        );
        
        
        $viewData->testimonialsSettings = $this->db->get("testimonials_settings")->result();

        $this->load->model("testimonials_model");

        $viewData->testimonials = $this->testimonials_model->get_all(
            array(
                "isActive"  => 1
            ), "rank DESC", array("start" => 0, "count" => 6)
        );
        

        $this->load->model("client_model");

        $viewData->clients = $this->client_model->get_all(
            array(
                "isActive" => 1
            ), "rank ASC"
        );
             
        
        $viewData->subscribeSettings = $this->db->get("members_settings")->result();


        $viewData->appDownloads = $this->db->get("app_download")->result();


        $viewData->teamSettings = $this->db->get("team_member_settings")->result();

        $this->load->model("team_member_model");

        $viewData->teams = $this->team_member_model->get_all(
            array(
                "isActive" => 1
            ), "rank ASC", array("start" => 0, "count" => 4)
        );


        $viewData->contactSettings = $this->db->get("contact_settings")->result();


        $this->load->model("social_model");

        $viewData->socials = $this->social_model->get_all(
            array(
                "isActive"  => 1
            ), "rank ASC"
        );


        $this->load->view($viewData->viewFolder, $viewData);
    }

    public function send_contact_message(){


        $this->load->library("form_validation");

        $this->form_validation->set_rules("email","Email Address","trim|required|valid_email");

        if($this->form_validation->run() === FALSE){


        } else {

            $this->load->model("messages_model");

            $insert = $this->messages_model->add(
                array(
                    "name"       => $this->input->post("name"),
                    "email"      => $this->input->post("email"),
                    "subject"    => $this->input->post("subject"),
                    "message"    => $this->input->post("message"),
                    "ip_address" => $this->input->ip_address(),
                    "createdAt"  => date("Y-m-d H:i:s")
                )
            );

            if($insert){

                $alert = array(
                    "title" => "Successful",
                    "text"  => "Your message has been sent successfully.",
                    "type"  => "success"
                );

            } else {

                $alert = array(
                    "title" => "Unsuccessful",
                    "text"  => "There was a problem sending the message.",
                    "type"  => "error"
                );
            }
        }

        $this->session->set_flashdata("alert", $alert);
        redirect(base_url("home"));
    }
    
    public function make_me_member(){

        $this->load->library("form_validation");

        $this->form_validation->set_rules("subscribe_email","Email Address","trim|required|valid_email");

        if($this->form_validation->run() === FALSE){


        } else {

            $this->load->model("member_model");

            $insert = $this->member_model->add(
                array(
                    "email"      => $this->input->post("subscribe_email"),
                    "ip_address" => $this->input->ip_address(),
                    "isActive"   => 1,
                    "createdAt"  => date("Y-m-d H:i:s")
                )
            );

            if($insert){

                $alert = array(
                    "title" => "Successful",
                    "text"  => "Your newsletter registration has been successfully completed.",
                    "type"  => "success"
                );

            } else {

                $alert = array(
                    "title" => "Unsuccessful",
                    "text"  => "There was a problem with your newsletter registration.",
                    "type"  => "error"
                );
            }
        }

        $this->session->set_flashdata("alert", $alert);
        redirect(base_url("home"));
    }
}



        