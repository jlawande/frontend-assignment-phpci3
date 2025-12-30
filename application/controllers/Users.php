<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function index()
    {
        $data = [];
        $data['errors'] = [];
        $data['success'] = '';

        if ($this->input->method() === 'post') {
            $name = trim($this->input->post('name'));
            $email = trim($this->input->post('email'));
            $password = trim($this->input->post('password'));

            if (empty($name)) $data['errors']['name'] = "Name is required";
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $data['errors']['email'] = "Invalid email";
            if (strlen($password) < 6) $data['errors']['password'] = "Password must be at least 6 characters";

            if (empty($data['errors'])) $data['success'] = "Form submitted successfully!";
        }

        $this->load->view('users/index', $data);
    }
}
