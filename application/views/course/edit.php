<?php
/**
 * Created by PhpStorm.
 * User: rodrigochaves
 * Date: 15/06/15
 * Time: 14:22
 */

$this->load->view('_inc/header');
?>

    <section class="container">

        <h2><?= 'Curso: '.$course->getName(); ?></h2>

        <?php $this->load->view('_inc/flashMensage'); ?>

        <br/>

        <?php //@todo tirar a página e colocar um campo de texto que ajuda a preencher com js?>

        <?= anchor('course/addUser/'.$course->getId(), 'Adicionar membros', array(
            'class' => 'btn'
        )) ?>

        <br/><br/>

        <table>
            <thead>
            <th>Nome</th>
            <th>Email</th>
            <th>Aprovar</th>
            <th>Reprovar</th>
            </thead>
            <tbody>
            <?php foreach($course->getUsers() as $u) : ?>
                <tr>
                    <td><?= $u->getFirstName()." ".$u->getLastName(); ?></td>
                    <td><?= $u->getEmail(); ?></td>
                    <td><?= anchor('course/approve/'.$course->getId().'/'.$u->getId(), '<i class="mdi-action-done-all"></i>', array(
                            'class' => 'btn'
                        ))?></td>
                    <td><?= anchor('course/disapprove/'.$course->getId().'/'.$u->getId(), '<i class="mdi-action-highlight-remove"></i>', array(
                            'class' => 'btn red'
                        ))?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

        <br/><br/><br/>

        <!-- @todo fazer uma tela para editar o curso-->
<!--        --><?//= anchor('course/edit/'.$course->getId(), 'Editar Curso', array(
//            'class' => 'btn left'
//        ))?>

        <?= anchor('course/listing', 'Voltar para os cursos', array(
            'class' => 'btn right'
        )) ?>

    </section>

<?php $this->load->view('_inc/footer'); ?>
