<?php
/**
 * Created by PhpStorm.
 * User: rodrigochaves
 * Date: 31/05/15
 * Time: 19:43
 */

class Profile extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        require('application/models/Entities/Profile.php');
        $this->load->model('profile_model');
    }

    function create()
    {
        $data['action'] = 'profile/createAction';
        $this->load->view('profile/create', $data);
    }

    function listing()
    {
        $data['profile'] = $this->profile_model->findAll(\Entities\Profile::getPath());
        $this->load->view('profile/listing', $data);
    }

    function edit($id)
    {
        $data['action'] = "profile/editAction";
        $data['profile'] = $this->profile_model->findById(\Entities\Profile::getPath(), $id);
        $this->load->view('profile/create', $data);
    }

    function createAction()
    {
        $profile = new \Entities\Profile();
        $profile->arrayToObject($this->input->post());
        $this->profile_model->create($profile);
        $this->session->set_flashdata('mensage', 'Perfil criado com sucesso!');
        redirect("profile/listing");
    }

    function editAction()
    {
        $profile = new \Entities\Profile();
        $profile->arrayToObject($this->input->post());
        $this->profile_model->update($profile);
        $this->session->set_flashdata('mensage', 'Perfil alterado com sucesso');
        redirect('profile/listing');
    }

    function deleteAction($id)
    {
        $profile = $this->profile_model->findById(\Entities\Profile::getPath(), $id);
        $this->profile_model->delete($profile);
        $this->session->set_flashdata('mensage', 'perfil excluído com sucesso!');
        redirect('profile/listing');
    }
}