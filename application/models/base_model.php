<?php
/**
 * Created by PhpStorm.
 * User: rodrigochaves
 * Date: 31/05/15
 * Time: 20:03
 */

class Base_model extends CI_Model
{
    private $em;
    private $qb;

    function __construct()
    {
        parent::__construct();
        $this->em = $this->doctrine->em;
        $this->qb = $this->em->createQueryBuilder();
    }

    public function create($entity)
    {
        $this->em->persist($entity);
        $this->em->flush();
    }

    public function update($entity)
    {
        $this->em->merge($entity);
        $this->em->flush();
    }

    public function delete($entity)
    {
        $this->em->remove($entity);
        $this->em->flush();
    }

    public function findAll($entity)
    {
        return $this->qb->select('e')
            ->from($entity, 'e')
            ->getQuery()
            ->getResult();
    }

    public function findById($entity, $id)
    {
        return $this->qb->select('e')
            ->from($entity, 'e')
            ->where('e.id = ?1')
            ->setParameter(1, $id)
            ->getQuery()
            ->getSingleResult();
    }
}