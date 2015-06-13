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
    }

    public function create()
    {
        $data['action'] = 'course/createAction';
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
        $this->load->view('course/create', $data);
    }

    public function createAction()
    {
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
}