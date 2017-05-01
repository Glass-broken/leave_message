<?php
    class User_info extends CI_Model
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
        }

        public function read_user_info($id) {
            $sql = "select * from lm_user where id = " . $id;
            $result = $this->db->query($sql);
            return $result->row_array();
        }
    }
?>