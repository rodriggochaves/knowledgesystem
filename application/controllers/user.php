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
        //verifica se existe agluém logado
        if($this->session->has_userdata('user')){
            //recupera o id da pessoa logada
            $id = $this->session->user['id'];

            //envia para a página de admin ou usuário
            if($this->session->user['profile'] == '1'){
                redirect('admin/home/'.$id);
            } else {
                redirect('user/home/'.$id);
            }
        }

        //envia para a página de login
        $data['action'] = 'user/loginAction';
        $this->load->view('user/login', $data);
    }

    public function create()
    {
        $this->isAdmin();
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
        if($this->session->user['profile'] != '1') redirect('user/index');
        $data['user'] = $this->user_model->findAll(\Entities\User::getPath());
        $this->load->view('user/listing', $data);
    }

    public function edit($id)
    {
        $data['action'] = 'user/editAction/'.$id;
        $data['user'] = $this->user_model->findById(\Entities\User::getPath() ,$id);
        $data['profiles'] = $this->profile_model->findAll(\Entities\Profile::getPath());
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
            //die(var_dump($this->input->post()));
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
                if($user->getProfile() == '1') {
                    redirect('admin/home/'.$user->getId());
                } else {
                    redirect('user/home/'.$user->getId());
                }
            }
        }
    }

    public function home($id)
    {
        //recupera usuário
        $user = $this->user_model->findById(\Entities\User::getPath(), $id);

        //armazena informação do usuário na session
        $user->setPassword("");//seta a senha como zero para não ser armazenada na session
        $userdata = $user->objectToArray();
        $userdata['profileDescription'] = $this->profile_model->findById(\Entities\Profile::getPath(), $userdata['profile'])->getDescription();
        $this->session->set_userdata('user', $userdata);

        //recupera cursos do usuário
        $data['userCourses'] = $user->getCourses();

        //carrega a view
        $this->load->view('user/home', $data);
    }

    //Função que verifica se o usuário logado é um admin.
    //Redireciona para a tela de login caso falso
    private function isAdmin()
    {
        if($this->session->user['profile'] !== '1') redirect('user/index');
    }

    //Função que verifica se o usuário está logado
    //Redireciona para a tela de login
    private function isLogged()
    {
        if($this->session->has_userdata()) redirect('user/index');
    }
}