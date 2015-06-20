<?php
/**
 * Created by PhpStorm.
 * User: rodrigochaves
 * Date: 20/06/15
 * Time: 14:02
 */

class admin extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        require('application/models/Entities/User.php');
        $this->load->model('user_model');
        $this->load->model('profile_model');
    }

    public function index()
    {
        $this->isAdmin();
        $this->load->view('user/admin/home');
    }

    public function home($id)
    {
        //recupera o admin
        $user = $this->user_model->findById(\Entities\User::getPath(), $id);

        //armazena informação do usuário na session
        $user->setPassword("");//seta a senha como zero para não ser armazenada na session
        $userdata = $user->objectToArray();
        $userdata['profileDescription'] = $this->profile_model->findById(\Entities\Profile::getPath(), $userdata['profile'])->getDescription();
        $this->session->set_userdata('user', $userdata);

        //carrega a view
        $this->load->view('user/admin/home');
    }

    public function logout()
    {
        //destroi a sessão
        $this->session->sess_destroy();

        //redireciona para o login de usuário
        redirect('user/index');
    }

    //Função que verifica se o usuário logado é um admin.
    //Redireciona para a tela de login caso falso
    private function isAdmin()
    {
        if($this->session->user['profile'] != '1') redirect('user/index');
    }
}