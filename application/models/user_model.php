<?php
/**
 * Created by PhpStorm.
 * User: rodrigochaves
 * Date: 31/05/15
 * Time: 21:03
 */

class User_model extends Base_model
{


    function __construct()
    {
        parent::__construct();
    }

    public function login($email, $password)
    {
        $user = $this->qb->select('v')
            ->from(\Entities\User::getPath(), 'v')
            ->where('v.email = ?1')
            ->andWhere('v.password = ?2')
            ->setParameter(1, $email)
            ->setParameter(2, md5($password))
            ->getQuery()
            ->getOneOrNullResult();

        if($user === null) {
            return null;
        } else {
            return $user;
        }
    }

    //recuperar os usuários com o ids passados e retorna um array
    //ideia que não funciona: busca para cada id o objeto correspondente
    public function findByIds($ids)
    {
        return $this->em->createQuery('SELECT u FROM \Entities\User u WHERE u.id IN (:ids)')
            ->setParameter('ids', $ids)->getResult();
    }

}