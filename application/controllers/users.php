<?php
class Users extends MY_Controller
{

    public function __construct ()
    {
        parent::__construct();
    }

    public function logout ()
    {

    }

    /**
     * Login a user and redirect him to questions
     */
    public function login ()
    {
        // TODO: Redirect user if already logged in
        // TODO: Setup a login form
        // TODO: Process the form
            // TODO: Try to log in
                // TODO: Redirect
                // TODO: Error Message
        // TODO: Set subview & load layout

        $this->load->model('question_model');
        $questions = $this->question_model->get_all();
        dump($questions);
    }

    public function register ()
    {}
}
