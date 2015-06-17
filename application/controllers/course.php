<?php
/**
 * Created by PhpStorm.
 * User: rodrigochaves
 * Date: 11/06/15
 * Time: 09:04
 */

class course extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        require('application/models/Entities/Course.php');
        $this->load->model('course_model');
        $this->load->model('knowledge_model');
    }

    public function create()
    {
        $data['action'] = 'course/createAction';
        $data['knowledge'] = $this->knowledge_model->findAll(\Entities\Knowledge::getPath());
        $this->load->view('course/create', $data);
    }

    public function listing()
    {
        $data['course'] = $this->course_model->findAll(\Entities\Course::getPath());
        $this->load->view('course/listing', $data);
    }

    public function edit($id)
    {
        $data['action'] = 'course/editAction/'.$id;
        $data['course'] = $this->course_model->findById(\Entities\Course::getPath(), $id);
        $this->load->view('course/edit', $data);
    }

    public function createAction()
    {
        //die(var_dump($this->input->post('knowledge')));
        $knowledge = $this->knowledge_model->findByIds(\Entities\Knowledge::getPath(), $this->input->post('knowledge'));
        //die(var_dump($knowledge[1]->getName()));
        $course = new \Entities\Course();
        $course->addKnowledge($knowledge);
        $course->arrayToObject($this->input->post());
        $this->course_model->create($course);
        $this->session->set_flashdata('mensage', 'Curso criado com sucesso!');
        redirect('course/listing');
    }

    public function editAction()
    {
        $course = new \Entities\Course();
        $course->arrayToObject($this->input->post());
        $this->course_model->update($course);
        $this->session->set_flashdata('mensage', 'Curso editado com sucesso!');
        redirect('course/listing');
    }

    public function deleteAction($id)
    {
        $course = $this->course_model->findById(\Entities\Course::getPath(), $id);
        $this->course_model->delete($course);
        $this->session->set_flashdata('mensage', 'Curso excluído com sucesso!');
        redirect('course/listing');
    }

    public function addUser($id)
    {
        $data['course'] = $this->course_model->findById(\Entities\Course::getPath(), $id);
        $this->load->model('user_model');
        $data['users'] = $this->user_model->findAll(\Entities\User::getPath());
        $this->load->view('course/addUser', $data);
    }

    //recuperar os usuários inseridos no form
    //com o curso e os usuários recuperados
    //adicionar os usuários na lista do curso e o curso em cada usuário
    //atualizar todos os objetos
    public function addUserAction($id)
    {
        $this->load->model('user_model');
        $course = $this->course_model->findById(\Entities\Course::getPath(), $id);
        $users = $this->user_model->findByIds(\Entities\User::getPath() ,$this->input->post());
        //die(var_dump($users[0]->getFirstName()));
        $course->addUser($users);
        $this->course_model->update($course);
        redirect('course/edit/'.$course->getId());
    }
}