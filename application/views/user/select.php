<?php
/**
 * Created by PhpStorm.
 * User: rodrigochaves
 * Date: 15/06/15
 * Time: 09:34
 */

$this->load->view('_inc/header');
//carrega o menu correspondente ao perfil do usuário logado
($this->session->user['profile'] == '1') ? $this->load->view('_inc/adminMenu') : $this->load->view('_inc/userMenu');
?>

    <section class="container">
        <h2>
            <?= $user->getFirstName()." ".$user->getLastName(); ?>
        </h2>

        <br/>

        <table>
            <thead>
                <th>Conhecimento</th>
                <!--<th>Remover</th>-->
            </thead>
            <tbody>
                <?php foreach($user->getUserKnowledge() as $k) : ?>
                <tr>
                    <td><?= $k->getName(); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>


    </section>

<?php $this->load->view('_inc/footer'); ?>