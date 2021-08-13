<?php

class Screenshots_images extends CI_Controller
{
    public $viewFolder = "";

    public function __construct()
    {
        parent::__construct();

        $this->viewFolder = "screenshots_images_view";
        $this->load->model("screenshots_images_model");

        if(!get_active_user()){
            redirect(base_url("login"));
        }
    }

    public function index(){

        $viewData = new stdClass();

        $viewData->viewFolder    = $this->viewFolder;
        $viewData->pageTitle     = "Screenshots";
        $viewData->subViewFolder = "image";

        $item_images = $this->screenshots_images_model->get_all(
            array(), "rank ASC"
        );
        $this->load->helper("text");

        $viewData->item_images = $item_images;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function imageDelete($id){

        $fileName = $this->screenshots_images_model->get(
            array(
                "id" => $id
            )
        );

        $delete = $this->screenshots_images_model->delete(
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
        redirect(base_url("screenshots_images/index"));
    }

    public function imageIsActiveSetter($id){

        if($id){

            $isActive = ($this->input->post("data") === "true") ? 1 : 0;

            $this->screenshots_images_model->update(
                array(
                    "id" => $id
                ),
                array(
                    "isActive" => $isActive
                )
            );
        }
    }

    public function imageRankSetter(){

        $data = $this->input->post("data");
        parse_str($data, $order);

        $items = $order["ord"];

        foreach ($items as $rank => $id){

            $this->screenshots_images_model->update(
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

    public function image_upload(){

        $file_name = convertToSEO(pathinfo($_FILES["file"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);

        $config["allowed_types"] = "jpg|jpeg|png";
        $config["upload_path"]   = "uploads/$this->viewFolder/";
        $config["file_name"]     = $file_name;

        $this->load->library("upload", $config);

        $upload = $this->upload->do_upload("file");

        if($upload){

            $uploaded_file = $this->upload->data("file_name");

            $this->screenshots_images_model->add(
                array(
                    "img_url"   => $uploaded_file,
                    "rank"      => 0,
                    "isActive"  => 1,
                    "createdAt" => date("Y-m-d H:i:s"),
                )
            );

        } else {
            echo "Unsuccessful";
        }
    }

    public function refresh_image_list(){

        $viewData = new stdClass();

        $viewData->viewFolder    = $this->viewFolder;
        $viewData->subViewFolder = "image";

        $item_images = $this->screenshots_images_model->get_all(
            array(), "rank ASC"
        );
        $this->load->helper("text");

        $viewData->item_images = $item_images;
        
        $render_html = $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/render_elements/image_list_v", $viewData, true);  
        echo $render_html;
    }
}
