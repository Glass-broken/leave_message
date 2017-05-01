<?php
    class user_page extends CI_Controller {
        public function index() {
            $this->load->model('user_info');
            $data = $this->user_info->read_user_info($_SESSION['id']);
            $this->load->view('user_page', $data);
        }
    }