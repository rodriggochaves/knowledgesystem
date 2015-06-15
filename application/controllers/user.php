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

    public function index()
    {
        $data['action'] = 'user/loginAction';
        $this->load->view('user/login', $data);
    }

    public function create()
    {
        $data['action'] = 'user/createAction';
        $this->load->view('user/create', $data);
    }

    public function select($id)
    {
        $data['user'] = $this->user_model->findById(\Entities\User::getPath(), $id);
        $this->load->view('user/select', $data);
    }

    public function listing()
    {
        $data['user'] = $this->user_model->findAll(\Entities\User::getPath());
        $this->load->view('user/listing', $data);
    }

    public function edit($id)
    {
        $data['action'] = 'user/editAction/'.$id;
        $data['user'] = $this->user_model->findById(\Entities\User::getPath() ,$id);
        $this->load->view('user/create', $data);
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
            $user->setPassword(md5($user->getPassword()));
            $this->user_model->create($user);
            $this->session->set_flashdata('mensage', 'Usuário criado com sucesso!');
            redirect('user/listing');
        }
    }

    public function editAction($id)
    {
        $this->load->library('form_validation');
        $this->load->library('encrypt');

        if($this->form_validation->run('editUser') == false) {
            $this->session->set_flashdata('warning', validation_errors());
            $this->edit($id);
        } else {
            $user = new \Entities\User();
            $user->arrayToObject($this->input->post());
            $user->setPassword(md5($user->getPassword()));
            $this->user_model->update($user);
            $this->session->set_flashdata('mensage', 'Usuário alterado com sucesso!');
            redirect('user/listing');
        }
    }

    public function loginAction()
    {
        $this->load->library('form_validation');
        $this->load->library('encrypt');

        $email = $this->input->post()['email'];
        $password = $this->input->post()['password'];

        if($this->form_validation->run('loginUser') == false)
        {
            $this->session->set_flashdata('warning', validation_errors());
            $this->index();
        } else {
            $user = $this->user_model->login($email, $password);
            if($user == null) {
                $this->session->set_flashdata('warning', 'O email ou a senha estão incorretas');
                $this->index();
            } else {
                $user->setPassword("");//seta a senha como zero para não ser armazenada na session
                $userdata = $user->objectToArray();
                $userdata['profile'] = $this->profile_model->findById(\Entities\Profile::getPath(), $userdata['profile'])->getDescription();
                $this->session->set_userdata('user', $userdata);
                redirect('user/home');
            }
        }
    }

    public function home()
    {
        $this->load->view('user/home');
    }
}