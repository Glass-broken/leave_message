<?php
//defined(BASEPATH) or exit('No derect script assess allowed');

class Home extends CI_Controller {
    public function index() {
        $this->load->model('database_use');
        $data['result']=$this->database_use->select_by_time();
        $this->load->view('home/message', $data);
    }
}