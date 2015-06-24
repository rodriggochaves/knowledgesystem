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



        <div class="row">
            <div class="col s4">
                <ul class="collection with-header">
                    <li class="collection-header"><h5 class="teal-text">Conhecimentos</h5></li>
                    <?php foreach($course->getCourseKnowledge() as $k) : ?>
                        <li class="collection-item"><?= $k->getName(); ?></li>
                    <?php endforeach; ?>
                </ul>
                <br/>
                <?= anchor('course/addKnowledge/'.$course->getId(), 'Adicionar conhecimentos', array(
                    'class' => 'btn'
                )) ?>

            </div>
            <div class="col s8">
                <ul class="collection with-header">
                    <li class="collection-header"><h5 class="teal-text">Membros</h5></li>
                    <?php foreach($course->getUsers() as $u) : ?>
                        <li class="collection-item"><?= $u->getFirstName().' '.$u->getLastName(); ?>
                            <a href="<?= site_url('/course/disapprove/'.$course->getId().'/'.$u->getId()) ?>" class="secondary-content">
                                <i class="material-icons red-text">clear</i>
                            </a>
                            <a href="<?= site_url('course/approve/'.$course->getId().'/'.$u->getId()) ?>" class="secondary-content">
                                <i class="material-icons">done_all</i>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <?= anchor('course/addUser/'.$course->getId(), 'Adicionar membros', array(
                    'class' => 'btn right'
                )) ?>
            </div>

        </div>

        <!-- @todo fazer uma tela para editar o curso-->
<!--        --><?//= anchor('course/edit/'.$course->getId(), 'Editar Curso', array(
//            'class' => 'btn left'
        //course/approve/'.$course->getId().'/'.$u->getId())
//        ))?>

        <?= anchor('course/listing', 'Voltar para os cursos', array(
            'class' => 'btn right'
        )) ?>

    </section>

<?php $this->load->view('_inc/footer'); ?>
