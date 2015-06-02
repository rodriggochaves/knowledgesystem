<?php
/**
 * Created by PhpStorm.
 * User: rodrigochaves
 * Date: 31/05/15
 * Time: 21:03
 */

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        require('application/models/Entities/User.php');
        $this->load->library('encrypt');
        $this->load->model('user_model');
        $this->load->model('profile_model');
    }

    public function create()
    {
        $data['action'] = 'user/createAction';
        $data['profile'] = $this->profile_model->findAll(\Entities\Profile::getPath());
        $this->load->view('user/create', $data);
    }

    public function listing()
    {
        $data['user'] = $this->user_model->findAll(\Entities\User::getPath());
        $this->load->view('user/listing');
    }

    public function createAction()
    {
        $this->load->library('form_validation');

        if($this->form_validation->run('createUser') == false) {
            $this->session->set_flashdata('warning', validation_errors());
            $this->create();
        } else {
            die("Rebeca muito legal");
        }

    }
}