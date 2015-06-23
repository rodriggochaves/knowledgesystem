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

        <h5>Meus Cursos</h5>

        <table>
            <thead>
                <th>Nome</th>
                <th>Link</th>
            </thead>
            <tbody>
                <?php foreach($userCourses as $c) : ?>
                <tr>
                    <td><?= $c->getName(); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <?php
            if($user['profile'] == '2') $this->load->view('user/_inc/teacherCourseHome');
        ?>

    </section>

<?php $this->load->view('_inc/footer'); ?>