<?php
/**
 * Created by PhpStorm.
 * User: rodrigochaves
 * Date: 31/05/15
 * Time: 21:06
 */
$this->load->view('_inc/header');
?>

<section class="container">

    <h1>Criar Usuário</h1>

    <?php echo form_open($action, 'class="form-horizontal" id="form"') ?>

    <input type="hidden" name="id" value="<?php if(isset($user)) echo $user->getId(); ?>"/>

    <div class="row">
        <div class="input-field col s6">
            <input type="text" name="firstName" class="form-control" value="<?php if(isset($user)) echo $user->getFirstName(); ?>"/>
            <label for="firstName">Primeiro Nome</label>
        </div>

        <div class="input-field col s6">
            <input type="text" name="lastName" class="form-control" value="<?php if(isset($user)) echo $user->getLastName(); ?>"/>
            <label for="lastName">Último Nome</label>
        </div>
    </div>

    <div class="row">
        <div class="input-field col s12">
            <input type="email" name="email" class="form-control" value="<?php if(isset($user)) echo $user->getEmail(); ?>"/>
            <label for="email">Email</label>
        </div>
    </div>

    <div class="row">
        <div class="input-field col s12">
            <input type="password" name="password" class="form-control" />
            <label for="password">Senha</label>
        </div>
    </div>

    <div class="row">
        <div class="input-field col s6">
            <select name="profile">
                <option value="" selected disabled></option>
                <?php foreach($profile as $p) : ?>
                    <option value="<?= $p->getId(); ?>"><?= $p->getDescription(); ?></option>
                <?php endforeach; ?>
            </select>
            <label for="profile">Perfil</label>
        </div>

        <div class="col s3 offset-s3">
            <button class="btn waves-effect waves-light" type="submit" name="action">Criar
                <i class="mdi-content-send right"></i>
            </button>
        </div>
    </div>

</section>

<?php $this->load->view('_inc/footer'); ?>