<?php
/**
 * Created by PhpStorm.
 * User: rodrigochaves
 * Date: 12/06/15
 * Time: 15:32
 */

$this->load->view('_inc/header');
?>

    <section class="container">

        <h1>Curso</h1>

        <?php $this->load->view('_inc/flashMensage'); ?>

        <br/>

        <div>
            <?= anchor('course/create',
                'Criar Curso',
                array('class' => 'btn')
            ); ?>
        </div>

        <br/>

        <table class="striped bordered">

            <thead>
                <th>Nome</th>
                <th>Data inicial</th>
                <th>Data final</th>
            </thead>

            <tbody>
                <?php foreach($course as $c) : ?>
                    <tr>
                        <td><?= $c->getName(); ?></td>
                        <td><?= $c->getStartDate(); ?></td>
                        <td><?= $c->getFinishDate(); ?></td>
                        <td>
                            <?=  anchor('course/edit/'.$c->getId(),
                                '<i class="mdi-content-create" title="Editar"></i>',
                                array('class' => 'btn') ); ?>
                        </td>
                        <td>
                            <button class="btn red" onclick="deleteConfirm('<?= site_url('course/deleteAction/'.$c->getId()); ?>')">
                                <i class="mdi-content-clear"></i>
                            </button>
                        </td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>

    </section>

<?php $this->load->view('_inc/footer'); ?>