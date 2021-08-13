<?php

class Userop extends CI_Controller {

    public $viewFolder = "";

    public function __construct()
    {
        parent::__construct();

        $this->viewFolder = "users_view";
        $this->load->model("user_model");
    }

    public function login(){

        if(get_active_user()){
            redirect(base_url());
        }

        $viewData = new stdClass();

        $viewData->viewFolder    = $this->viewFolder;
        $viewData->pageTitle     = "Sign in";
        $viewData->subViewFolder = "login";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function do_login(){

        if(get_active_user()){
            redirect(base_url());
        }

        $this->load->library("form_validation");

        $this->form_validation->set_rules("user_email", "Email Address", "required|trim|valid_email");
        $this->form_validation->set_rules("user_password", "Password", "required|trim|min_length[6]|max_length[18]");

        $this->form_validation->set_message(
            array(
                "required"    => "{field} are field cannot be left blank!",
                "valid_email" => "Please enter a valid email address.",
                "min_length"  => "<b>{field}</b> Must be at least 6 characters.",
                "max_length"  => "{field} Must be a maximum of 18 characters.",
            )
        );

        if($this->form_validation->run() == FALSE){

            $viewData = new stdClass();

            $viewData->viewFolder    = $this->viewFolder;
            $viewData->pageTitle     = "Sign in";
            $viewData->subViewFolder = "login";
            $viewData->form_error    = true;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

        } else {

            $user = $this->user_model->get(
                array(
                    "email"    => $this->input->post("user_email"),
                    "password" => md5($this->input->post("user_password"))
                )
            );

            if($user){

                $alert = array(
                    "title" => "Successful",
                    "text"  => "Welcome, $user->full_name",
                    "type"  => "success"
                );

                $this->session->set_userdata("user", $user);
                $this->session->set_flashdata("alert", $alert);

                redirect(base_url());

            } else {

                $alert = array(
                    "title" => "Error!",
                    "text"  => "Please check your login information!",
                    "type"  => "error"
                );

                $this->session->set_flashdata("alert", $alert);
                redirect(base_url("login"));
            }
        }
    }

    public function logout(){
                
        $alert = array(
            "title" => "Exit",
            "text"  => "Successfully logged out.",
            "type"  => "success"
        );

        $this->session->set_userdata("user", $user);
        $this->session->set_flashdata("alert", $alert);

        $this->session->unset_userdata("user");
        redirect(base_url("login"));
    }

    public function forget_password(){

        if(get_active_user()){
            redirect(base_url());
        }

        $viewData = new stdClass();
    
        $viewData->viewFolder    = $this->viewFolder;
        $viewData->pageTitle     = "Reset Your Password";
        $viewData->subViewFolder = "forget_password";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function reset_password(){

        $this->load->library("form_validation");

        $this->form_validation->set_rules("email", "Email Address", "required|trim|valid_email");

        $this->form_validation->set_message(
            array(
                "required"    => "{field} are field cannot be left blank!",
                "valid_email" => "Please enter a valid email address.",
            )
        );

        if($this->form_validation->run() === FALSE){

            $viewData = new stdClass();
        
            $viewData->viewFolder    = $this->viewFolder;
            $viewData->subViewFolder = "forget_password";
            $viewData->form_error    = true;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

        } else {

            $user = $this->user_model->get(
                array(
                    "email" => $this->input->post("email")
                )
            );

            if($user){

                $this->load->model("emailsettings_model");
                $this->load->helper("string");

                $temp_password = random_string();

                $email_settings = $this->emailsettings_model->get(
                    array(
                        "isActive" => 1
                    )
                );

                $config = array(

                    "protocol"  => $email_settings->protocol,
                    "smtp_host" => $email_settings->host,
                    "smtp_port" => $email_settings->port,
                    "smtp_user" => $email_settings->user,
                    "smtp_pass" => $email_settings->password,
                    "starttls"  => true,
                    "charset"   => "utf-8",
                    "mailtype"  => "html",
                    "wordwrap"  => true,
                    "newline"   => "\r\n"
                );

                $this->load->library("email", $config);

                $this->email->from($email_settings->from, $email_settings->user_name);
                $this->email->to($user->email);
                $this->email->subject("Forget Password");
                $this->email->message("Your Temporary Password <b>{$temp_password}</b>");

                $send = $this->email->send();

                if($send){
                    echo "Email sent successfully. Please check your email.";

                    $this->user_model->update(
                        array(
                            "id" => $user->id
                        ),
                        array(
                            "password" => md5($temp_password)
                        )
                    );

                    $alert = array(
                        "title" => "Successful",
                        "text"  => "Email sent successfully. Please check your email.",
                        "type"  => "success"
                    );

                    $this->session->set_flashdata("alert", $alert);
                    redirect(base_url("login"));

                    die();

                } else {

                    $alert = array(
                        "title" => "Unsuccessful",
                        "text"  => "There was a problem sending the email!",
                        "type"  => "error"
                    );

                    $this->session->set_flashdata("alert", $alert);
                    redirect(base_url("forgot-password"));

                    die();
                }

            } else {

                $alert = array(
                    "title" => "Unsuccessful",
                    "text"  => "No such user found!",
                    "type"  => "error"
                );

                $this->session->set_flashdata("alert", $alert);
                redirect(base_url("forgot-password"));
            }
        }
    }
}
