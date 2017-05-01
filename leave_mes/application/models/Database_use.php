<?php
class Database_use extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function select_by_time(){
        $query = "select lm_message.id, content, title, createtime, user_name from lm_message inner join lm_user on user_id = lm_user.id order by createtime";
        $result = $this->db->query($query);
        return $result;
    }

    public function insert_message($data) {
        $this->db->insert('lm_message',$data);
    }

    public function register($data) {
        $this->db->insert('lm_user', $data);
        if ($this->db->affected_rows() <= 0) {
            $flag = 0;
        }
        else {
            $flag = 1;
        }
        return $flag;
    }
    public function query_user_info($name) {
        $query = "select * from lm_user where user_name = '". $name . "'";
        $result = $this->db->query($query);
        $row = $result->row();
        return $row;
    }

    public function create_mes($data) {
        $query = "select id from lm_user where user_name = '" . $_SESSION['user_name'] . "'";
        $result = $this->db->query($query);
        $row = $result->row();
        $data['user_id'] = $row->id;
        //$query = "insert into lm_message (user_id, content, title, createtime) value(" . $id . ",'" . $data['content'] . "','" . $data['title'] . "','" . $createtime . "')";
        //$this->db->query($query);
        $this->db->insert('lm_message', $data);
        return $this->db->affected_rows();
    }

    public function read_message_all() {
        $query = "select * from lm_message, lm_user where user_id = id";
        $result = $this->db->query($query);
        return $result;
    }
    public function read_message_user() {
        $query = "select lm_message.id, content, title, createtime, user_name from lm_message inner join lm_user on user_id = lm_user.id where lm_message.user_id = ". $_SESSION['id'];
        $result = $this->db->query($query);
        return $result;
    }

    public function delete_mes($id) {
        $query = "delete from lm_message where id = " . $id;
        $this->db->query($query);
        if ($this->db->affected_rows() == 1) {
            return true;
        }
        else if ($this->db->affected_rows() > 1) {
            return false;
        }
        else {
            return false;
        }
    }

    public function reply_insert($reply_info, $id) {
        $time = date("Y-m-d H:i:s");
        $data['re_time'] = $time;
        $data['user_id'] = $_SESSION['id'];
        $data['content_id'] = $id;
        $data['re_content'] = $reply_info;
        $this->db->insert('lm_replay', $data);
        return $this->db->affected_rows();
    }

    public function is_reply($id) {
        $query = "select lm_replay.id from lm_message inner join lm_replay on lm_replay.content_id = lm_message.id where lm_message.id = " . $id;
        $this->db->query($query);
        if ($this->db->affected_rows() > 0) {
            return true;
        }
        else {
            return false;
        }
    }

    public function select_reply($id) {
        $query = "select lm_user.user_name, re_content, re_time from lm_replay inner join lm_user on lm_user.id = user_id inner join lm_message on lm_message.id = content_id where lm_message.id = " . $id;
        $result = $this->db->query($query);
        return $result;
    }
}