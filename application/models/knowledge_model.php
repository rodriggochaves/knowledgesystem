<?php
/**
 * Created by PhpStorm.
 * User: rodrigochaves
 * Date: 27/05/15
 * Time: 21:16
 */

class Knowledge_model extends CI_Model {

    private $em;
    private $qb;

    function __construct()
    {
        parent::__construct();
        $this->em = $this->doctrine->em;
        $this->qb = $this->em->createQueryBuilder();
    }

    public function create($knowledge)
    {
        $this->em->persist($knowledge);
        $this->em->flush();
    }

    public function findAll()
    {
        return $this->qb->select('k')
            ->from('\Entities\Knowledge', 'k')
            ->getQuery()
            ->getResult();
    }

    public function findById($id)
    {
        return $this->qb->select('k')
            ->from('\Entities\Knowledge', 'k')
            ->where('k.id = ?1')
            ->setParameter(1, $id)
            ->getQuery()
            ->getSingleResult();
    }
}