<?php
/**
 * Created by PhpStorm.
 * User: rodrigochaves
 * Date: 15/06/15
 * Time: 14:22
 */

$this->load->view('_inc/header');

//carrega o menu correspondente ao perfil do usuário logado
($this->session->user['profile'] == '1') ? $this->load->view('_inc/adminMenu') : $this->load->view('_inc/userMenu');
?>

    <section class="container">

        <h2><?= 'Curso: '.$course->getName(); ?></h2>

        <?php $this->load->view('_inc/flashMensage'); ?>

        <br/>

        <?php //@todo tirar a página de adicionar e colocar um campo de texto que ajuda a preencher com js?>

        <?= anchor('course/addKnowledge/'.$course->getId(), 'Adicionar conhecimentos', array(
            'class' => 'btn'
        )) ?>

        <br/><br/>

        <h5><strong>Conhecimentos</strong></h5>
        <table>
            <thead>
                <th>Nome</th>
            </thead>
            <tbody>
                <?php foreach($course->getCourseKnowledge() as $k) : ?>
                <tr>
                    <td><?= $k->getName(); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <br/>
        <br/>
        <br/>

        <?= anchor('course/addUser/'.$course->getId(), 'Adicionar membros', array(
            'class' => 'btn'
        )) ?>

        <br/><br/>

        <h5><strong>Membros</strong></h5>
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
