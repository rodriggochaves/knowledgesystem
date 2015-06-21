<?php
/**
 * Created by PhpStorm.
 * User: rodrigochaves
 * Date: 20/06/15
 * Time: 13:02
 */

?>

<nav>
    <div class="nav-wrapper teal">
        <div class="container">
            <a href="<?= site_url('user/index'); ?>" class="brand-logo">Knowledge System</a>

            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="<?= site_url('course/listing') ?>">Cursos</a></li>
                <li><a href="<?= site_url('user/userKnowledge') ?>">Meus Conhecimentos</a></li>
                <li><a href="<?=site_url('user/logout') ?>"><i class="mdi-content-clear"></i></a></li>
            </ul>
        </div>

    </div>
</nav>