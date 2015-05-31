<?php
/**
 * Created by PhpStorm.
 * User: rodrigochaves
 * Date: 31/05/15
 * Time: 19:44
 */

namespace Entities;

/**
 * Class Profile
 * @package Entities
 * @Entity
 * @Table(name="Profile")
 */

class Profile {

    /**
     * @Id
     * @Column(name="idProfile", type="integer", nullable=false)
     * @GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @Column(name="description", nullable=false)
     */
    private $description;

    public static function getPath()
    {
        return '\Entities\Profile';
    }

    public function arrayToObject($arr)
    {
        $this->description = $arr['description'];
        $this->id = $arr['id'];
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $descrption
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }


}