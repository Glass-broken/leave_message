<?php
    class reply_mes extends CI_Controller {
        public function index() {
            $this->load->model("database_use");
            $this->load->library('form_validation');
            $id = $_GET['id'];
            $data['id'] = $id;
            $data['result'] = $this->database_use->read_message_user();
            $this->load->view('reply', $data);
        }

        public function reply() {
            $this->load->model("database_use");
            $this->load->library('form_validation');

            $reply_info = $this->input->post('reply_info');
            $flag = $this->database_use->reply_insert($reply_info, $_GET['id']);
            if ($flag) {
                redirect("my_message/index");
            }
            else {

            }
        }
    }
?>