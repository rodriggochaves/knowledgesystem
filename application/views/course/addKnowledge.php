<?php
/**
 * Created by PhpStorm.
 * User: rodrigochaves
 * Date: 18/06/15
 * Time: 16:33
 */

$this->load->view('_inc/header');

($this->session->user['profile'] == '1') ? $this->load->view('_inc/adminMenu') : $this->load->view('_inc/userMenu');
?>

<section class="container">

    <h3><?= 'Adicinar conhecimentos em '.$course->getName(); ?></h3>

    <br/>

    <?= form_open('course/addKnowledgeAction/'.$course->getId()) ?>

    <table>
        <thead>
        <th>Nomes</th>
        <th>Adicionar</th>
        </thead>
        <tbody>
        <?php foreach($knowledge as $k) : ?>
            <tr>
                <td><?= $k->getName()?></td>
                <td>
                    <p>
                        <input type="checkbox" class="filled-in" id="<?= $k->getId(); ?>" name="<?= $k->getId(); ?>" value="<?= $k->getId(); ?>"/>
                        <label for="<?= $k->getId(); ?>"></label>
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