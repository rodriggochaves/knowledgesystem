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
        $data['profile'] = $this->profile_model->findAll(\Entities\Profile::getPath());
        $this->load->view('user/create', $data);
    }
}