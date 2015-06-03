<?php
/**
 * Created by PhpStorm.
 * User: rodrigochaves
 * Date: 02/06/15
 * Time: 15:22
 */

$config = array(
    'createUser' => array(
        array(
            'field' => 'firstName',
            'label' => 'firstName',
            'rules' => 'required',
            'errors' => array(
                'required' => 'Insira um nome'
            )
        ),
        array(
            'field' => 'lastName',
            'label' => 'lastName',
            'rules' => 'required',
            'errors' => array(
                'required' => 'Insira um nome'
            )
        ),
        array(
            'field' => 'email',
            'label' => 'email',
            'rules' => 'required|valid_email',
            //TODO impedir cadastro de email duplicados
            'errors' => array(
                'required' => 'Insira um email',
                'valid_email' => 'Insira um email válido'
            )
        ),
        array(
            'field' => 'password',
            'label' => 'password',
            'rules' => 'required',
            'errors' => array(
                'required' => 'Insira uma senha'
            )
        ),
        array(
            'field' => 'passwordConfirmation',
            'label' => 'passwordConfirmation',
            'rules' => 'required|matches[password]',
            'errors' => array(
                'matches' => 'As senhas não combinam',
                'required' => ''
            )
        ),
    )
);