<?php
/**
 * Created by PhpStorm.
 * User: rodrigochaves
 * Date: 15/06/15
 * Time: 14:32
 */
?>

<?php if($this->session->flashdata('mensage') != null) : ?>
    <div class="card-panel teal lighten-1 white-text">
        <?= $this->session->flashdata('mensage') ?>
    </div>
<?php endif; ?>