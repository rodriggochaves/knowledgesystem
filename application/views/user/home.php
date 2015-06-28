<?php
/**
 * Created by PhpStorm.
 * User: rodrigochaves
 * Date: 11/06/15
 * Time: 08:09
 */

$this->load->view('_inc/header');

$this->load->view('_inc/userMenu');

$user = $this->session->userdata('user');
?>

    <section class="container">

        <h1>Bem Vindo</h1>

        <h6 class="right-align"><?= $user['firstName']." ".$user['lastName'].", ".$user['profileDescription'] ?></h6>

        <div class="row">
            <div class="col s6">
                <ul class="collection with-header">
                    <li class="collection-header"><h5 class="teal-text">Meus Cursos</h5></li>
                    <?php foreach($userCourses as $c) : ?>
                        <li class="collection-item"><?= $c->getName(); ?>
                            <a href="<?= site_url('course/select/'.$c->getId()); ?>" class="secondary-content">
                                <i class="material-icons">list</i>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

        <?php
            if($user['profile'] == '2') $this->load->view('user/_inc/teacherCourseHome');
        ?>

    </section>

<?php $this->load->view('_inc/footer'); ?>