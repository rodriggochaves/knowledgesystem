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
        $queryCount = $this->qb->select('count(u)')
            ->from(\Entities\User::getPath(), 'u')
            ->where('u.email = ?1')
            ->andWhere('u.password = ?2')
            ->setParameter(1, $email)
            ->setParameter(2, md5($password))
            ->getQuery();

        if($queryCount->getSingleScalarResult() == 0) {
            return null;
        } else {
            $query = $this->qb->select('v')
                ->from(\Entities\User::getPath(), 'v')
                ->where('v.email = ?1')
                ->andWhere('v.password = ?2')
                ->setParameter(1, $email)
                ->setParameter(2, md5($password))
                ->getQuery();

            return $query->getSingleResult();
        }
    }

}