<?php
/**
 * Created by PhpStorm.
 * User: rodrigochaves
 * Date: 31/05/15
 * Time: 21:06
 */
$this->load->view('_inc/header');

$this->load->view('_inc/adminMenu');
?>

<section class="container">

    <h1>Criar Usuário</h1>

    <?php if($this->session->flashdata('warning') != null) :?>
        <div class="card-panel small red lighten-1 white-text">
            <?= validation_errors(); ?>
        </div>
    <?php endif; ?>

    <?php echo form_open($action, 'class="form-horizontal" id="form"') ?>

    <input type="hidden" name="id" value="<?php if(isset($user)) echo $user->getId(); ?>"/>
    <input type="hidden" name="profile" value="<?= isset($user) ? $user->getProfile() : 3  ?>"/>

    <div class="row">
        <div class="input-field col s6">
            <input type="text" name="firstName" class="form-control" value="<?= isset($user) ?  $user->getFirstName() : set_value('firstName'); ?>"/>
            <label for="firstName">Primeiro Nome</label>
        </div>

        <div class="input-field col s6">
            <input type="text" name="lastName" class="form-control" value="<?= isset($user) ?  $user->getLastName() : set_value('lastName'); ?>"/>
            <label for="lastName">Último Nome</label>
        </div>
    </div>

    <div class="row">
        <div class="input-field col s12">
            <!--@TODO habilitar validação para cada campo individualmente-->
            <input type="email" name="email" class="form-control" value="<?= isset($user) ?  $user->getEmail() : set_value('email'); ?>" />
            <label for="email">Email</label>
        </div>
    </div>

    <? if(!isset($user)) : ?>
        <div class="row">
            <div class="input-field col s6">
                <input type="password" name="password" class="form-control"/>
                <label for="password">Senha</label>
            </div>
            <div class="input-field col s6">
                <input type="password" name="passwordConfirmation" class="form-control"/>
                <label for="passwordConfirmation">Confirmação da Senha</label>
            </div>
        </div>
    <? else : ?>
        <? //TODO criar botão de mudar senha ?>

        <input type="hidden" name="password" value="<?= $user->getPassword(); ?>"/>
    <? endif; ?>

    <div class="row">
        <div class="col s6">
            <div class="input-field col s12">
                <select name="profile" id="profile">
                    <?php if(isset($user)) : ?>
                        <option <?php if($user->getProfile() == 2) echo 'selected' ?> value="2">Professor</option>
                        <option <?php if($user->getProfile() == 3) echo 'selected' ?> value="3">Aluno</option>
                    <?php else : ?>
                        <option value="2">Professor</option>
                        <option value="3">Aluno</option>
                    <?php endif; ?>
                </select>
            </div>
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