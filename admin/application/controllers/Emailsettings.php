<?php

class Emailsettings extends CI_Controller
{
    public $viewFolder = "";

    public function __construct()
    {
        parent::__construct();

        $this->viewFolder = "users_view";
        $this->load->model("emailsettings_model");

        if(!get_active_user()){
            redirect(base_url("login"));
        }
    }
    
    public function update_form($id){

        $viewData = new stdClass();

        $item = $this->emailsettings_model->get(
            array(
                "id" => $id,
            )
        );
        $this->load->helper("text");
        
        $viewData->viewFolder    = $this->viewFolder;
        $viewData->pageTitle     = "Email Settings";
        $viewData->subViewFolder = "emailsettings";
        $viewData->item = $item;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function update($id){

        $this->load->helper("text");

        $this->load->library("form_validation");

        $this->form_validation->set_rules("protocol", "Protocol", "required|trim");
        $this->form_validation->set_rules("host", "Email Server", "required|trim");
        $this->form_validation->set_rules("port", "Port Number", "required|trim");
        $this->form_validation->set_rules("user_name", "Email Title", "required|trim");
        $this->form_validation->set_rules("user", "Email (User)", "required|trim|valid_email");
        $this->form_validation->set_rules("from", "From Email", "required|trim|valid_email");
        $this->form_validation->set_rules("to", "To Email", "required|trim|valid_email");
        $this->form_validation->set_rules("password", "Password", "required|trim");

        $this->form_validation->set_message(
            array(
                "required"    => "{field} are field cannot be left blank!",
                "valid_email" => "Please enter a valid email address.",
            )
        );
    
        $validate = $this->form_validation->run();

        if($validate){

            $update = $this->emailsettings_model->update(
                array("id" => $id),
                array(
                    "protocol"  => $this->input->post("protocol"),
                    "host"      => $this->input->post("host"),
                    "port"      => $this->input->post("port"),
                    "user_name" => $this->input->post("user_name"),
                    "user"      => $this->input->post("user"),
                    "from"      => $this->input->post("from"),
                    "password"  => $this->input->post("password"),
                    "to"        => $this->input->post("to")
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
            redirect(base_url("emailsettings/update_form/$id"));

        } else {

            $viewData = new stdClass();
                    
            $viewData->viewFolder    = $this->viewFolder;
            $viewData->pageTitle     = "Email Settings";
            $viewData->subViewFolder = "emailsettings";
            $viewData->form_error    = true;
            
            $viewData->item = $this->emailsettings_model->get(
                array(
                    "id" => $id,
                )
            );

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }
}
