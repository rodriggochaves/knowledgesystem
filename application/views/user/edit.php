<?php
/**
 * Created by PhpStorm.
 * User: rodrigochaves
 * Date: 20/06/15
 * Time: 12:18
 */

$this->load->view('_inc/header');
?>

<section class="container">

    <h1>Editar usuário</h1>

    <?= form_open($action, 'class="form-horizontal" id="form"') ?>

    <input type="hidden" name="id" value="<?php if(isset($user)) echo $user->getId(); ?>"/>

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
            <?php //@TODO habilitar validação para cada campo individualmente ?>
            <input type="email" name="email" class="form-control" value="<?= isset($user) ?  $user->getEmail() : set_value('email'); ?>" />
            <label for="email">Email</label>
        </div>
    </div>

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

    <div class="row">
        <div class="col s6">
            <div class="input-field col s12">
                <select name="profile" id="profile">
                    <option <?php if($user->getProfile() == 2) echo 'selected' ?> value="2">Professor</option>
                    <option <?php if($user->getProfile() == 3) echo 'selected' ?> value="3">Aluno</option>
                </select>
            </div>
        </div>
    </div>

</section>

<?php $this->load->view('_inc/footer'); ?>