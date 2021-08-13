<?php

class Users extends CI_Controller
{
    public $viewFolder = "";

    public function __construct()
    {
        parent::__construct();

        $this->viewFolder = "users_view";
        $this->load->model("user_model");
        
        if(!get_active_user()){
            redirect(base_url("login"));
        }
    }

    public function update_form($id){

        $viewData = new stdClass();

        $item = $this->user_model->get(
            array(
                "id" => $id,
            )
        );
        $this->load->helper("text");

        $viewData->viewFolder    = $this->viewFolder;
        $viewData->pageTitle     = "Edit Profile";
        $viewData->subViewFolder = "update";
        $viewData->item = $item;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function update($id){

        $this->load->helper("text");

        $this->load->library("form_validation");

        $oldUser = $this->user_model->get(
            array(
                "id" => $id
            )
        );

        if($oldUser->email != $this->input->post("email")){
            $this->form_validation->set_rules("email", "E-Mail Address", "required|trim|valid_email|is_unique[users.email]");
        }

        $this->form_validation->set_rules("full_name", "Full Name", "required|trim");

        $this->form_validation->set_message(
            array(
                "required"    => "{field} cannot be left blank!",
                "valid_email" => "Please enter a valid email address.",
                "is_unique"   => "<b>{field}</b> previously used",
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
                        "full_name" => $this->input->post("full_name"),
                        "email"     => $this->input->post("email"),
                        "img_url"   => $uploaded_file,
                        "updatedAt" => date("Y-m-d H:i:s")
                    );

                } else {

                    $alert = array(
                        "title" => "Unsuccessful",
                        "text"  => "There was a problem loading the image.",
                        "type"  => "error"
                    );

                    $this->session->set_flashdata("alert", $alert);
                    redirect(base_url("users/update_form/$id"));

                    die();
                }

            } else {

                $data = array(
                    "full_name" => $this->input->post("full_name"),
                    "email"     => $this->input->post("email"),
                    "updatedAt" => date("Y-m-d H:i:s")
                );
            }

            $update = $this->user_model->update(array("id" => $id), $data);

            if($update){

                $alert = array(
                    "title" => "Successful",
                    "text"  => "The registration has been updated successfully",
                    "type"  => "success"
                );

            } else {

                $alert = array(
                    "title" => "Unsuccessful",
                    "text"  => "There was a problem during the update",
                    "type"  => "error"
                );
            }

            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("users/update_form/$id"));

        } else {

            $viewData = new stdClass();

            $viewData->viewFolder    = $this->viewFolder;
            $viewData->pageTitle     = "Edit Profile";
            $viewData->subViewFolder = "update";
            $viewData->form_error    = true;

            $viewData->item = $this->user_model->get(
                array(
                    "id" => $id,
                )
            );

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }
    
    public function update_password_form($id){

        $viewData = new stdClass();
        
        $item = $this->user_model->get(
            array(
                "id" => $id,
            )
        );
        $this->load->helper("text");
    
        $viewData->viewFolder    = $this->viewFolder;
        $viewData->pageTitle     = "Change Password";
        $viewData->subViewFolder = "password";
        $viewData->item = $item;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function update_password($id){

        $this->load->helper("text");

        $this->load->library("form_validation");

        $this->form_validation->set_rules("password", "Password", "required|trim|min_length[6]|max_length[18]");
        $this->form_validation->set_rules("re_password", "Password Again", "required|trim|min_length[6]|max_length[18]|matches[password]");

        $this->form_validation->set_message(
            array(
                "required"   => "{field} are field cannot be left blank!",
                "min_length" => "{field} Must be at least 6 characters.",
                "max_length" => "{field} Must be a maximum of 18 characters.",
                "matches"    => "Passwords do not match."
            )
        );

        $validate = $this->form_validation->run();

        if($validate){
      
            $update = $this->user_model->update(
                array("id" => $id),
                array(
                    "password" => md5($this->input->post("password")),
                )
            );
  
            if($update){

                $alert = array(
                    "title" => "Successful",
                    "text"  => "Your password has been successfully updated",
                    "type"  => "success"
                );

            } else {

                $alert = array(
                    "title" => "Unsuccessful",
                    "text"  => "There was a problem updating the password",
                    "type"  => "error"
                );
            }

            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("users/update_password_form/$id"));

        } else {

            $viewData = new stdClass();
       
            $viewData->viewFolder    = $this->viewFolder;
            $viewData->pageTitle     = "Change Password";
            $viewData->subViewFolder = "password";
            $viewData->form_error    = true;
            
            $viewData->item = $this->user_model->get(
                array(
                    "id" => $id,
                )
            );

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }
}