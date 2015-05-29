<?php
/**
 * Created by PhpStorm.
 * User: rodrigochaves
 * Date: 28/05/15
 * Time: 22:57
 */

$this->load->view('_inc/header');
?>

<section class="container">

    <?php if($this->session->flashdata('mensage') != null)
        echo "<div class=''>
            <p>".$this->session->flashdata('mensage')."</p>
        </div>";
    ?>

    <h1>Conhecimentos</h1>

    <div>
        <a href="<?php echo base_url()."index.php/knowledge/create"; ?>">Criar Conhecimentos</a>
    </div>

    <hr/>

    <table class="striped">
        <thead>
            <th>#</th>
            <th>Nome</th>
            <th>Descrição</th>
        </thead>

        <tbody>
            <?php foreach($knowledge as $k) : ?>
                <tr>
                    <td><?= $k->getId(); ?></td>
                    <td><?= $k->getName(); ?></td>
                    <td><?= $k->getDescription(); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>

</section>

<?php $this->load->view('_inc/footer'); ?>