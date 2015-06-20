<?php
/**
 * Created by PhpStorm.
 * User: rodrigochaves
 * Date: 20/06/15
 * Time: 14:03
 */
?>

<nav>
    <div class="nav-wrapper teal">
        <div class="container">
            <a href="<?= site_url('admin/index'); ?>" class="brand-logo">Knowledge System</a>

            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="<?= site_url('user/listing') ?>">Usuários</a></li>
                <li><a href="<?=site_url('admin/logout') ?>"><i class="mdi-content-clear"></i></a></li>
            </ul>
        </div>

    </div>
</nav>