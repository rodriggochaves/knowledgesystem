<?php
/**
 * Created by PhpStorm.
 * User: rodrigochaves
 * Date: 21/06/15
 * Time: 11:11
 */

$this->load->view('_inc/header');
$this->load->view('_inc/userMenu');
?>

<section class="container">

    <br/>

    <h3>Meus Conhecimentos</h3>

    <br/><br/>

    <table>
        <thead>
            <th>Nome</th>
            <th>Descrição</th>
        </thead>
        <tbody>
            <?php foreach($user->getUserKnowledge() as $k) : ?>
                <tr>
                    <td><?= $k->getName() ?></td>
                    <td><?= $k->getDescription() ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</section>

<?php
$this->load->view('_inc/footer')
?>