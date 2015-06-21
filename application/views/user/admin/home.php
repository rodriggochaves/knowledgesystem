<?php
/**
 * Created by PhpStorm.
 * User: rodrigochaves
 * Date: 20/06/15
 * Time: 13:43
 */

$this->load->view('_inc/header');

$this->load->view('_inc/adminMenu');
?>

<section class="container">

    <br/>

    <div class="row">
        <div class="col s12">
            <div class="card-panel teal lighten-1">
                <h5><a class="white-text" href="<?= site_url('user/listingUsersKnowledge'); ?>">Conhecimentos Aprendidos pelos Membros</a></h5>
            </div>
        </div>
    </div>

</section>


<?php $this->load->view('_inc/footer') ?>