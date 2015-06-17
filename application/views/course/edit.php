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

                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

        <br/><br/><br/>

        <?= anchor('course/listing', 'Voltar para os cursos', array(
            'class' => 'btn right'
        )) ?>

    </section>

<?php $this->load->view('_inc/footer'); ?>
