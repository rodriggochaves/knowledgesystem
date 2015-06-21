<?php
/**
 * Created by PhpStorm.
 * User: rodrigochaves
 * Date: 20/06/15
 * Time: 16:51
 */

$this->load->view('_inc/header');
$this->load->view('_inc/adminMenu');
?>

<section class="container">

    <h3>Conhecimentos Aprendidos pelos Membros</h3>

    <br/><br/>

    <table class="striped">
        <thead>
            <th>Nome</th>
            <th>Conhecimentos</th>
        </thead>
        <tbody>
            <?php foreach($user as $u) : ?>
                <tr>
                    <td><?= $u->getFirstName().' '.$u->getLastName() ?></td>
                    <td>
                        <?php foreach($u->getUserKnowledge() as $k) : ?>
                            <p><?= $k->getName(); ?></p>
                        <?php endforeach; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</section>

<?php

$this->load->view('_inc/footer');

?>