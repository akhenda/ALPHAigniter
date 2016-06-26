<?php
class User_model extends MY_Model {

    public $validation = array(
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required|valid_email|trim'),
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'required|trim'));

    public function __construct () {
        parent::__construct();

        $this->has_many['questions'] = array('foreign_model'=>'question_model','foreign_table'=>'questions','foreign_key'=>'user_id','local_key'=>'id');
        $this->has_many['answers'] = array('foreign_model'=>'answer_model','foreign_table'=>'answers','foreign_key'=>'user_id','local_key'=>'id');

        $this->_database = $this->db;
    }
}
