<?php
class Question_model extends MY_Model {
    public function __construct () {
        parent::__construct();

        $this->has_one['user'] = array('foreign_model'=>'user_model','foreign_table'=>'users','foreign_key'=>'id','local_key'=>'user_id');
        $this->has_many['answers'] = array('foreign_model'=>'answer_model','foreign_table'=>'answers','foreign_key'=>'questions_id','local_key'=>'id');

        $this->_database = $this->db;
    }

    public function get_with_users ()
    {
        $this->db->select('questions.*, users.first_name, users.last_name');
        $this->db->join('users', 'questions.user_id=users.id');
        return $this->get_all();
    }
}
