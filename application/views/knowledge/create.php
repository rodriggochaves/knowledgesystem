<?php
/**
 * Created by PhpStorm.
 * User: rodrigochaves
 * Date: 27/05/15
 * Time: 21:27
 */

$this->load->view('_inc/header');
?>

<section class="container">

    <h1>Criar conhecimento</h1>

    <?php echo form_open($action, 'class="form-horizontal" id="form"') ?>

    <div class="input-field">
        <input type="text" name="name"/>
        <label for="name">Nome</label>
    </div>

    <div class="input-field">
        <textarea name="description" class="materialize-textarea"></textarea>
        <label for="description">Descrição</label>
    </div>

    <div class="input-field">
        <input type="submit" value="Criar" class="btn"/>
    </div>

</section>

<?php $this->load->view('_inc/footer'); ?>