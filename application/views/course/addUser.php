<?php
/**
 * Created by PhpStorm.
 * User: rodrigochaves
 * Date: 15/06/15
 * Time: 18:34
 */

$this->load->view('_inc/header');

($this->session->user['profile'] == '1') ? $this->load->view('_inc/adminMenu') : $this->load->view('_inc/userMenu');
?>

<section class="container">

    <h2><?= 'Adicinar Membros em '.$course->getName(); ?></h2>

    <br/>

    <?= form_open('course/addUserAction/'.$course->getId()) ?>

    <table>
        <thead>
            <th>Nomes</th>
            <th>Adicionar</th>
        </thead>
        <tbody>
            <?php foreach($users as $u) : ?>
            <tr>
                <td><?= $u->getFirstName().' '.$u->getLastName(); ?></td>
                <td>
                    <p>
                        <input type="checkbox" class="filled-in" id="<?= $u->getId(); ?>" name="<?= $u->getId(); ?>" value="<?= $u->getId(); ?>"/>
                        <label for="<?= $u->getId(); ?>"></label>
                    </p>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <br/><br/>

    <input type="submit" value="Adicionar" class="btn"/>

</section>

<?php $this->load->view('_inc/footer'); ?>