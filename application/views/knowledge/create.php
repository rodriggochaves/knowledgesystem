<?php
/**
 * Created by PhpStorm.
 * User: rodrigochaves
 * Date: 27/05/15
 * Time: 21:27
 */

$this->load->view('_inc/header');

$this->load->view('_inc/adminMenu');
?>

<section class="container">

    <h1>Criar conhecimento</h1>

    <?php echo form_open($action, 'class="form-horizontal" id="form"') ?>

    <input type="hidden" name="id" value="<?php if(isset($knowledge)) echo $knowledge->getId(); ?>"/>

    <div class="input-field">
        <input type="text" name="name" class="form-control" placeholder="Name" value="<?php if(isset($knowledge)) echo $knowledge->getName(); ?>"/>
    </div>

    <div class="input-field">
        <textarea name="description" class="materialize-textarea" placeholder="Descrição"><?php if(isset($knowledge)) echo $knowledge->getDescription(); ?></textarea>
    </div>

    <button class="btn waves-effect waves-light" type="submit" name="action">Criar
        <i class="mdi-content-send right"></i>
    </button>

</section>

<?php $this->load->view('_inc/footer'); ?>