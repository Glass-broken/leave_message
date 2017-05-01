<?php
class User_exit extends CI_Controller {
    public function index() {
        session_destroy();
        redirect(site_url('home/index'));
    }
}