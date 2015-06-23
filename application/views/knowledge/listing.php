<?php
/**
 * Created by PhpStorm.
 * User: rodrigochaves
 * Date: 28/05/15
 * Time: 22:57
 */

$this->load->view('_inc/header');

$this->load->view('_inc/adminMenu');
?>

<section class="container">

    <h1>Conhecimentos</h1>

    <br/>

    <?php $this->load->view('_inc/flashMensage') ?>

    <br/>

    <div>
        <?= anchor(
            'knowledge/create',
            'Criar Conhecimento',
            array(
              'class' => 'btn'
            )) ?>
    </div>

    <br/>

    <table class="striped bordered">
        <thead>
            <th>#</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Editar</th>
            <th>Deletar</th>
        </thead>

        <tbody>
            <?php foreach($knowledge as $k) : ?>
                <tr>
                    <td><?= $k->getId(); ?></td>
                    <td><?= $k->getName(); ?></td>
                    <td><?= $k->getDescription(); ?></td>
                    <td>
                        <?=  anchor('knowledge/edit/'.$k->getId(), '<i class="mdi-content-create" title="Editar"></i>', array('class' => 'btn') ); ?>
                    </td>
                    <td>
                        <button class="btn red" onclick="deleteConfirm('<?= site_url('knowledge/deleteAction/'.$k->getId()) ?>')">
                            <i class="mdi-content-clear"></i>
                        </button>
                    </td>
                    
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>

</section>

<?php $this->load->view('_inc/footer'); ?>