<?php
class Users extends Backend_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function logout() {

    }

    /**
     * Login a user and redirect him to questions
     */
    public function login() {
        // Redirect user if already logged in
				// if ($this->ion_auth->logged_in() == TRUE) {
        //     redirect('questions/listing');
        // }

        // TODO: Setup a login form
        // TODO: Process the form
            // TODO: Try to log in
                // TODO: Redirect
                // TODO: Error Message
        // Set subview & load layout

        $data['title'] = $this->lang->line('login_heading');

				//validate form input
				$this->form_validation->set_rules('identity', str_replace(':', '', $this->lang->line('login_identity_label')), 'required');
				$this->form_validation->set_rules('password', str_replace(':', '', $this->lang->line('login_password_label')), 'required');

				if ($this->form_validation->run() == true) {
					// check to see if the user is logging in
					// check for "remember me"
					$remember = (bool) $this->input->post('remember');

					if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember)) {
						//if the login is successful
						//redirect them back to the home page
						$this->session->set_flashdata('message', $this->ion_auth->messages());
						redirect('/', 'refresh');
					} else {
						// if the login was un-successful
						// redirect them back to the login page
						$this->session->set_flashdata('message', $this->ion_auth->errors());
						redirect('auth/login', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
					}
				} else {
					// the user is not logging in so display the login page
					// set the flash data error message if there is one
					$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

					$data['identity'] = array('name' => 'identity',
						'id'    => 'identity',
						'type'  => 'text',
						'value' => $this->form_validation->set_value('identity'),
					);
					$data['password'] = array('name' => 'password',
						'id'   => 'password',
						'type' => 'password',
					);

					// $this->_render_page('auth/login', $data);
					$this->load_view('auth/login', $data);

				}

    }

    public function register(){

    }

    public function index() {
        $this->load->view('welcome/welcome_message');
    }

}
