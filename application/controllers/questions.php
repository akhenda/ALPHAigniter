<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Questions extends Backend_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('question_model');
    $this->load->model('answer_model');
  }

  function index()
  {

  }

  public function add()
  {
      #code
  }

  /**
   * Display a single question
   */
  public function detail($id)
  {
      // Fetch a single question with its user and answers
      $cacheID = 'question_' . $id;
      if (!$this->data['question'] = $this->cache->get($cacheID)) {
        $this->data['question'] = $this->question_model->with('user')->get($id);
        $this->cache->save($cacheID, $this->data['question'], 900);
      }

      $cacheID = 'answer_' . $id;
      if (!$this->data['answers'] = $this->cache->get($cacheID)) {
        $this->db->where('questions_id', $id);
        $this->data['answers'] = $this->answer_model->with('user')->get_all();
        $this->cache->save($cacheID, $this->data['answers'], 900);
      }

      // Save the answer
      if (count($_POST)){
        $this->answer_model->insert();
        $this->cache->delete('answer_' . $id);
        redirect(current_url());
      }

      // Load view
      $this->load_view('questions/detail');
  }

  /**
   * Display a list of all questions
   */
  public function listing()
  {
      // Fetch all questions
      $cacheID = 'listing';
      if (!$this->data['questions'] = $this->cache->get($cacheID)) {
        $this->data['questions'] = $this->question_model->get_with_users();
        $this->cache->save($cacheID, $this->data['questions'], 900);
      }


      // Load view
      $this->load_view('questions/listing');
  }

}
