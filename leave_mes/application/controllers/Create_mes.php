<?php
class Create_mes extends CI_Controller {
    public function index()
    {

        $this->load->view('create_mes');


    }
    public function create() {
        $this->load->library('form_validation');
        $this->load->model('database_use');
        $data['content'] = $this->input->post('content');
        $data['title'] = $this->input->post('title');
        $data['createtime'] = date('Y-m-d H-i-s');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('content', 'Content', 'required');
        if (($result = $this->database_use->create_mes($data)) > 0 && ($this->form_validation->run() != FALSE)) {
            redirect('home/index');
        }
        else {
            echo 'error';
            $this->load->view('create_mes');
            echo '发帖失败';
        }
    }

}