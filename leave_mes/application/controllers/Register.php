<?php

class Register extends CI_Controller {

    public function index()
    {

        $this->load->library('form_validation');

        $this->load->model('database_use');

        $this->form_validation->set_rules('user_name','name', 'required|min_length[1]|max_length[10]');
        $this->form_validation->set_rules('user_password', 'password', 'required|min_length[6]|max_length[16]');
        $this->form_validation->set_rules('user_password1', 'password confirmation', 'trim|required|matches[user_password]');
        $this->form_validation->set_rules('user_sex', 'sex', 'required');
        $this->form_validation->set_rules('user_email', 'email', 'trim|required|valid_email');
        $this->form_validation->set_rules('user_realname', 'real_name', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('register');
        }
        else
        {
            $data['user_name'] = $this->input->post('user_name');
            $data['user_password'] = $this->input->post('user_password');
            $data['user_sex'] = $this->input->post('user_sex');
            $data['user_email'] = $this->input->post('user_email');
            $data['user_realname'] = $this->input->post('user_realname');
            $data['user_date'] = date('Y-m-d');
            $flag = $this->database_use->register($data);
            if ($flag <= 0) {
                $this->load->view('register');
            }
            $this->load->view('register_success');
        }
    }
}