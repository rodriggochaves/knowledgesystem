<?php
/**
 * Created by PhpStorm.
 * User: rodrigochaves
 * Date: 11/06/15
 * Time: 08:09
 */

$this->load->view('_inc/header');

$user = $this->session->userdata('user');
?>

    <section class="container">

        <h1>Bem vindo</h1>

        <h6 class="right-align"><?= $user['firstName']." ".$user['lastName']." , ".$user['profile'] ?></h6>

    </section>

<?php $this->load->view('_inc/footer'); ?>