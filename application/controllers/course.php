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
        $this->load->model('user_model');
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
        $knowledge = $this->knowledge_model->findByIds(\Entities\Knowledge::getPath(), $this->input->post('knowledge'));
        $course = new \Entities\Course();
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

    public function addKnowledge($id)
    {
        $data['course'] = $this->course_model->findById(\Entities\Course::getPath(), $id);
        $this->load->model('knowledge_model');
        $data['knowledge'] = $this->knowledge_model->findAll(\Entities\Knowledge::getPath());
        $this->load->view('course/addKnowledge', $data);
    }


    public function addKnowledgeAction($id)
    {
        $course = $this->course_model->findById(\Entities\Course::getPath(), $id);
        $knowledge = $this->knowledge_model->findByIds(\Entities\Knowledge::getPath() ,$this->input->post());
        $course->addKnowledge($knowledge);
        $this->course_model->update($course);
        redirect('course/edit/'.$course->getId());
    }


    public function addUser($id)
    {
        $data['course'] = $this->course_model->findById(\Entities\Course::getPath(), $id);
        $this->load->model('user_model');
        $data['users'] = $this->user_model->findAll(\Entities\User::getPath());
        $this->load->view('course/addUser', $data);
    }


    public function addUserAction($id)
    {
        $course = $this->course_model->findById(\Entities\Course::getPath(), $id);
        $users = $this->user_model->findByIds(\Entities\User::getPath() ,$this->input->post());
        $course->addUser($users);
        $this->course_model->update($course);
        redirect('course/edit/'.$course->getId());
    }

    public function approve($idCourse, $idUser)
    {
        $course = $this->course_model->findById(\Entities\Course::getPath(), $idCourse);
        $user = $this->user_model->findById(\Entities\User::getPath(), $idUser);
        $user->addKnowledge($course->getCourseKnowledge());
        $course->removeUser($user);
        $this->user_model->update($user);
        $this->course_model->update($course);
        redirect('course/edit/'.$course->getId());
    }

    public function disapprove($idCourse, $idUser)
    {

        $course = $this->course_model->findById(\Entities\Course::getPath(), $idCourse);
        $user = $this->user_model->findById(\Entities\User::getPath(), $idUser);
        $course->removeUser($user);
        $this->course_model->update($course);
        redirect('course/edit/'.$course->getId());
    }
}