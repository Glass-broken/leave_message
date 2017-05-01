<?php
    class My_message extends CI_Controller
    {
        public function index()
        {
            $this->load->model('database_use');

            $data['result'] = $this->database_use->read_message_user();
            $this->load->view('my_message', $data);
        }
    }
?>