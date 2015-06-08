<?php
/**
 * Created by PhpStorm.
 * User: rodrigochaves
 * Date: 02/06/15
 * Time: 18:38
 */

$this->load->view('_inc/header');
?>

<section class="container">

    <h1>Membros</h1>

    <?php if($this->session->flashdata('mensage') != null) : ?>
        <div class="card-panel teal lighten-1 white-text">
            <?= $this->session->flashdata('mensage') ?>
        </div>
    <?php endif; ?>

    <br/>

    <div>
        <?= anchor(
            'user/create',
            'Criar Membro',
            array(
                'class' => 'btn'
            )
        ); ?>
    </div>

    <br/>

    <table class="striped bordered">
        <thead>
            <th>Primerio Nome</th>
            <th>Ultimo Nome</th>
            <th>Email</th>
            <th>Editar</th>
        </thead>
        <tbody>
            <?php foreach($user as $u) : ?>
                <tr>
                    <td><?= $u->getFirstName(); ?></td>
                    <td><?= $u->getLastName(); ?></td>
                    <td><?= $u->getEmail(); ?></td>
                    <td><?= anchor('user/edit/'.$u->getId(), '<i class="mdi-content-create" title="Editar"></i>', array('class' => 'btn')) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</section>

<?php $this->load->view('_inc/footer'); ?>