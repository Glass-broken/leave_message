<?php
    class delete_mes extends CI_Controller {
        public function index() {


        }

        public function delete() {
            $this->load->model('database_use');
            $id = $_GET['id'];
            echo $id;
            if ($this->database_use->delete_mes($id)) {
                //redirect("http://localhost/leave_mes/index.php/my_message/index");
                redirect("my_message/index");
            }
            else {
                //redirect("http://localhost/leave_mes/index.php/home/index");
                redirect("home/index");
            }
            redirect("home/index");
        }
    }
?>