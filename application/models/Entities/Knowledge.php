<?php
/**
 * Created by PhpStorm.
 * User: rodrigochaves
 * Date: 27/05/15
 * Time: 20:59
 */

namespace Entities;

/**
 * Class Knowledge
 * @package Entities
 * @Entity
 * @Table(name="Knowledge")
 */

class Knowledge {

    /**
     * @Id
     * @Column(name="idKnowledge", type="integer", nullable=false)
     * @GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @Column(name="name")
     */
    private $name;

    /**
     * @Column(name="description")
     */
    private $description;

    /**
     * @ManyToMany(targetEntity="Course", mappedBy="courseKnowledge")
     * @JoinColumn(name="course_idCourse")
     */
    private $courses;

    /**
     * @ManyToMany(targetEntity="User", mappedBy="userKnowledge")
     * @JoinColumn(name="Knowledge_idKnowledge")
     */
    private $users;

    public static function getPath()
    {
        return '\Entities\Knowledge';
    }

    public function arrayToObject($arr) {
        $this->description = $arr['description'];
        $this->name = $arr['name'];
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getCourses()
    {
        return $this->courses;
    }

    /**
     * @param mixed $courses
     */
    public function setCourses($courses)
    {
        $this->courses = $courses;
    }

    /**
     * @return mixed
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * @param mixed $users
     */
    public function setUsers(User $users)
    {
        $this->users = $users;
    }
}