<?php
/**
 * Created by PhpStorm.
 * User: rodrigochaves
 * Date: 12/06/15
 * Time: 15:32
 */

$this->load->view('_inc/header');

//armazena em uma variável local o perfil do usuário logado
$profile = $this->session->user['profile'];

($this->session->user['profile'] == '1') ? $this->load->view('_inc/adminMenu') : $this->load->view('_inc/userMenu');
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
                            <?php  if($profile == '1' || $profile == '2') echo anchor('course/edit/'.$c->getId(), '<i class="mdi-content-create" title="Editar"></i>', array(
                                'class' => 'btn'
                            ) ); ?>
                        </td>
                        <td>
                            <?php if($profile == '1') : ?>
                                <button class="btn red" onclick="deleteConfirm('<?= site_url('course/deleteAction/'.$c->getId()); ?>')">
                                    <i class="mdi-content-clear"></i>
                                </button>
                            <?php endif; ?>
                        </td>
                        <?php if($profile == '3') : ?>
                            <td><a class="btn" href="<?= site_url('course/addLoggedUser/'.$c->getId()); ?>">
                                    <i class="mdi-editor-mode-edit"></i>
                                </a></td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>

    </section>

<?php $this->load->view('_inc/footer'); ?>