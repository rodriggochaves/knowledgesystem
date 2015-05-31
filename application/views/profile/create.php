<?php
/**
 * Created by PhpStorm.
 * User: rodrigochaves
 * Date: 31/05/15
 * Time: 20:36
 */

$this->load->view('_inc/header');
?>

<section class=" container">
    <h1>Criar Perfil</h1>

    <?php echo form_open($action, 'class="form-horizontal" id="form"') ?>

    <input type="hidden" name="id" value="<?php if(isset($profile)) echo $profile->getId(); ?>"/>

    <div class="input-field">
        <input type="text" name="description" class="form-control" placeholder="Descrição" value="<?php if(isset($profile)) echo $profile->getdescription(); ?>"/>
    </div>

    <button class="btn waves-effect waves-light" type="submit" name="action">Criar
        <i class="mdi-content-send right"></i>
    </button>

</section>

<?php $this->load->view('_inc/footer'); ?>