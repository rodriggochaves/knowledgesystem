<?php
/**
 * Created by PhpStorm.
 * User: rodrigochaves
 * Date: 27/05/15
 * Time: 21:15
 */

class Knowledge extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        require('application/models/Entities/Knowledge.php');
        $this->load->model('knowledge_model');
    }

    public function create()
    {
        $data['action'] = 'knowledge/createAction';
        $this->load->view('knowledge/create', $data);
    }

    public function listing()
    {
        $data['knowledge'] = $this->knowledge_model->findAll();
        $this->load->view('knowledge/listing', $data);
    }

    public function edit($id)
    {
        $data['action'] = "knowledge/editAction";
        $data['knowledge'] = $this->knowledge_model->findById($id);
        $this->load->view('knowledge/create', $data);
    }

    public function createAction() {
        $knowledge = new \Entities\Knowledge();
        $knowledge->arrayToObject($this->input->post());
        $this->knowledge_model->create($knowledge);
        $this->session->set_flashdata('mensage', 'Conhecimento criado com sucesso!');
        redirect("knowledge/listing");
    }

    public function editAction()
    {
        $knowledge = new \Entities\Knowledge();
        $knowledge->arrayToObject($this->input->post());
        $this->knowledge_model->update($knowledge);
        $this->session->set_flashdata('mensage', 'Conhecimento alterado com sucesso');
        redirect('knowledge/listing');
    }

    public function deleteAction($id)
    {
        $knowledge = $this->knowledge_model->findById($id);
        $this->knowledge_model->delete($knowledge);
        $this->session->set_flashdata('mensage', 'Conhecimento excluído com sucesso!');
        redirect('knowledge/listing');
    }

}