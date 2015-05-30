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
        echo "<div class='card-panel small teal lighten-2'>
            <div class='container'>
                <p class='white-text'>".$this->session->flashdata('mensage')."</p>
            </div>
        </div>";
    ?>

    <h1>Conhecimentos</h1>

    <br/>

    <div>
        <a class="btn btn-primary" href="<?php echo base_url()."index.php/knowledge/create"; ?>">Criar Conhecimentos</a>
    </div>

    <br/>

    <table class="striped bordered">
        <thead>
            <th>#</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Editar</th>
            <th>Deletar</th>
        </thead>

        <tbody>
            <?php foreach($knowledge as $k) : ?>
                <tr>
                    <td><?= $k->getId(); ?></td>
                    <td><?= $k->getName(); ?></td>
                    <td><?= $k->getDescription(); ?></td>
                    <td>
                        <a href="<?php echo base_url()."index.php/knowledge/edit".$k->getId(); ?>">
                            <i class="mdi-content-create" title="Editar"></i>
                        </a>
                    </td>
                    <td>
                        <a href="<?php echo base_url()."index.php/knowledge/deleteAction".$k->getId(); ?>">
                            <i class="mdi-content-clear" title="Deletar"></i>
                        </a>
                    </td>
                    
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>

</section>

<?php $this->load->view('_inc/footer'); ?>