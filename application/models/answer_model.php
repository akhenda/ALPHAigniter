<?php
class Answer_model extends MY_Model {

    public $validation = array(
        array('field' => 'user_id', 'label' => '', 'rules' => 'intval'),
        array('field' => 'questions_id', 'label' => '', 'rules' => 'intval'),
        array('field' => 'text', 'label' => 'Answer', 'rules' => 'trim|sanitize'),
         );

    public function __construct () {
        parent::__construct();

        $this->has_one['user'] = array('foreign_model'=>'user_model','foreign_table'=>'users','foreign_key'=>'id','local_key'=>'user_id');
        $this->has_one['question'] = array('foreign_model'=>'question_model','foreign_table'=>'questions','foreign_key'=>'id','local_key'=>'questions_id');

        $this->_database = $this->db;
    }

    /**
     * Insert an answer from POST values
     * @see MY_Model::insert()
     */
    // public function insert ()
    // {
    //     $data = array(
    //         'user_id' => $this->input->post('user_id'),
    //         'questions_id' => $this->input->post('questions_id'),
    //         'text' => $this->input->post('text'),
    //     );
    //     //$this->load->model('answer_model');
    //     //$this->answer_model->insert($data);
    // }
}
