<?php
/**
 * Created by PhpStorm.
 * User: rodrigochaves
 * Date: 11/06/15
 * Time: 08:09
 */

$this->load->view('_inc/header');

$user = $this->session->userdata('user');
?>

    <section class="container">

        <h1>Bem vindo</h1>

        <h6 class="right-align"><?= $user['firstName']." ".$user['lastName'].", ".$user['profileDescription'] ?></h6>

        <h5>Cursos</h5>

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

    </section>

<?php $this->load->view('_inc/footer'); ?>