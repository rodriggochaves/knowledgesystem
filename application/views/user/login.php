<?php
/**
 * Created by PhpStorm.
 * User: rodrigochaves
 * Date: 08/06/15
 * Time: 13:02
 */
$this->load->view('_inc/header');
?>

<section class="container center-align">

    <br/>
    <h1 class="teal-text">Knowledge System</h1>
    <br/><br/><br/>

    <?= form_open($action, 'class="form-horizontal"', 'id="form"') ?>

    <?php if($this->session->flashdata('warning') != null) : ?>
        <div class="card-panel red lighten-1 white-text">
            <?= $this->session->flashdata('warning') ?>
        </div>
    <?php endif; ?>

    <div class="card-panel center-align">
        <div class="input-field">
            <input type="email" name="email"/>
            <label for="email">Email</label>
        </div>
        <div class="input-field">
            <input type="password" name="password"/>
            <label for="password">Senha</label>
        </div>

        <br/>

        <button class="btn waves-effect waves-light" type="submit" name="action">Login
            <i class="mdi-content-send right"></i>
        </button>
    </div>

</section>

<?php $this->load->view('_inc/footer'); ?>
