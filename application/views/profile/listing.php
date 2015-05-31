<?php
/**
 * Created by PhpStorm.
 * User: rodrigochaves
 * Date: 31/05/15
 * Time: 20:36
 */

$this->load->view('_inc/header');
?>

    <section class="container">

        <?php if($this->session->flashdata('mensage') != null)
            echo "<div class='card-panel small teal lighten-2'>
            <div class='container'>
                <p class='white-text'>".$this->session->flashdata('mensage')."</p>
            </div>
        </div>";
        ?>

        <h1>Perfis</h1>

        <br/>

        <div>
            <?= anchor(
                'profile/create',
                'Criar Perfil',
                array(
                    'class' => 'btn'
                )) ?>
        </div>

        <br/>

        <table class="striped bordered">
            <thead>
            <th>#</th>
            <th>Descrição</th>
            <th>Editar</th>
            <th>Deletar</th>
            </thead>

            <tbody>
            <?php foreach($profile as $p) : ?>
                <tr>
                    <td><?= $p->getId(); ?></td>
                    <td><?= $p->getDescription(); ?></td>
                    <td>
                        <?=  anchor('profile/edit/'.$p->getId(), '<i class="mdi-content-create" title="Editar"></i>', array('class' => 'btn') ); ?>
                    </td>
                    <td>
                        <button class="btn red" onclick="deleteConfirm('<?= site_url('profile/deleteAction/'.$p->getId()) ?>')">
                            <i class="mdi-content-clear"></i>
                        </button>
                    </td>

                </tr>
            <?php endforeach; ?>
            </tbody>

        </table>

    </section>

<?php $this->load->view('_inc/footer'); ?>