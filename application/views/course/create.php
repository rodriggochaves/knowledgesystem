<?php
/**
 * Created by PhpStorm.
 * User: rodrigochaves
 * Date: 11/06/15
 * Time: 09:16
 */

$this->load->view('_inc/header');
?>

<section class="container">

    <h1>Curso</h1>

    <!--@todo criar um arquivo para guardar as mensagens flash-->
    <?php if($this->session->flashdata('mensage') != null) : ?>
        <div class="card-panel teal lighten-1 white-text">
            <?= $this->session->flashdata('mensage') ?>
        </div>
    <?php endif; ?>

    <?= form_open($action, 'class="form-horizontal" id="form"') ?>

    <input type="hidden" name="id" value="<?php if(isset($course)) echo $course->getId(); ?>"/>

    <div class="row">
        <div class="input-field col s12">
            <input type="text" name="name" class="form-control" value="<?= isset($course) ?  $course->getName() : set_value('name'); ?>"/>
            <label for="name">Nome</label>
        </div>
    </div>

    <div class="row">
        <div class="input-field col s6">
            <input type="date" class="datepicker" name="startDate" value="<?= isset($course) ? $course->getStartDate() : set_value('startDate'); ?>"/>
            <label for="startDate">Data inicial</label>
        </div>
        <div class="input-field col s6">
            <input type="date" class="datepicker" name="finishDate" value="<?= isset($course) ? $course->getFinishDate() : set_value('finishDate'); ?>"/>
            <label for="finishDate">Data final</label>
        </div>
    </div>

    <br/>

    <div class="row">
        <div class="col s3">
            <button class="btn waves-effect waves-light" type="submit" name="action">Criar
                <i class="mdi-content-send right"></i>
            </button>
        </div>
    </div>


</section>

<?php $this->load->view('_inc/footer'); ?>