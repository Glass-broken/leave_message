<?php
    class Login extends CI_Controller {
        public function index() {
            $this->load->library('form_validation');
            $this->load->model('database_use');
            $this->load->view('login');
        }

        public function query(){
            $this->load->library('form_validation');
            $this->load->model('database_use');
            $this->form_validation->set_rules('user_name', 'name', 'required|max_length[10]|min_length[1]');
            $this->form_validation->set_rules('user_password', 'password', 'required|max_length[16]|min_length[6]');
            $name = $this->input->post('user_name');
            $password = $this->input->post('user_password');
            $row = $this->database_use->query_user_info($name);
            $sex = $row->user_sex;
            $id = $row->id;
            $email = $row->user_email;
            $realname = $row->user_realname;

            if ($this->form_validation->run() == FALSE) {
                $data['warning'] = '表单验证错误';
                echo '表单验证错误';
                $this->load->view('login', $data);
            }
            else if ($row->user_password != $password) {
                echo '账号密码错误';
                $data['warning'] = '账号或密码错误';
                $data['result'] = $row->user_password;
                $this->load->view('login', $data);
            }
            else {
                $_SESSION['id'] = $id;
                $_SESSION['user_name'] = $name;
                $_SESSION['password'] = $password;
                $_SESSION['sex'] = $sex;
                $_SESSION['email'] = $email;
                $_SESSION['realname'] = $realname;
                //$this->load->view('login_success');
                redirect("home/index");
            }
        }
    }
?>