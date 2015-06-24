<?php
/**
 * Created by PhpStorm.
 * User: rodrigochaves
 * Date: 23/06/15
 * Time: 17:27
 */

$this->load->view('_inc/header');
$this->load->view('_inc/userMenu');
?>

<section class="container">

    <h2><?= $course->getName(); ?></h2>

    <br/>

    <div class="row">
        <div class="col s6">
            <ul class="collection with-header">
                <li class="collection-header"><h5 class="teal-text">Conhecimentos</h5></li>
                <?php foreach($course->getCourseKnowledge() as $k) : ?>
                    <li class="collection-item"><?= $k->getName(); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="col s6">
            <ul class="collection with-header">
                <li class="collection-header"><h5 class="teal-text">Membros</h5></li>
                <?php foreach($course->getUsers() as $u) : ?>
                    <li class="collection-item"><?= $u->getFirstName(); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>


</section>

<?php
$this->load->view('_inc/footer');
?>