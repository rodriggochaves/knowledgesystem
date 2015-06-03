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
        $this->load->model('user_model');
        $this->load->model('profile_model');
    }

    public function create()
    {
        $data['action'] = 'user/createAction';
        $this->load->view('user/create', $data);
    }

    public function listing()
    {
        $data['user'] = $this->user_model->findAll(\Entities\User::getPath());
        $this->load->view('user/listing', $data);
    }


    public function createAction()
    {
        $this->load->library('form_validation');
        $this->load->library('encrypt');

        if($this->form_validation->run('createUser') == false) {
            $this->session->set_flashdata('warning', validation_errors());
            $this->create();
        } else {
            $user = new \Entities\User();
            $user->arrayToObject($this->input->post());
            $user->setPassword($this->encrypt->encode($user->getPassword()));
            $this->user_model->create($user);
            $this->session->set_flashdata('mensage', 'Usuário criado com sucesso!');
            redirect('user/listing');
        }

    }
}