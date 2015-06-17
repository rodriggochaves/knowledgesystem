<?php
/**
 * Created by PhpStorm.
 * User: rodrigochaves
 * Date: 11/06/15
 * Time: 08:55
 */

namespace Entities;

/**
 * Class Course
 * @package Entities
 * @Entity
 * @Table(name="Course")
 */

class Course {

    /**
     * @Id
     * @column(name="idCourse", type="integer", nullable=false)
     * @GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @Column(name="name", nullable=false)
     */
    private $name;

    /**
     * @Column(name="startDate")
     */
    private $startDate;

    /**
     * @Column(name="finishDate")
     */
    private $finishDate;

    /**
     * @ManyToMany(targetEntity="Knowledge", mappedBy="knowledgeCourse")
     */
    private $courseKnowledge;

    /**
     * @ManyToMany(targetEntity="User", inversedBy="courses")
     * @JoinTable(name="User_has_Course",
     *  joinColumns={@JoinColumn(name="Course_idCourse", referencedColumnName="idCourse")},
     *  inverseJoinColumns={@JoinColumn(name="User_idUser", referencedColumnName="idUser")})
     */
    private $users;

    public static function getPath()
    {
        return '\Entities\Course';
    }

    public function arrayToObject($arr)
    {
        $this->finishDate = $arr['finishDate'];
        $this->startDate = $arr['startDate'];
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
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param mixed $startDate
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    }

    /**
     * @return mixed
     */
    public function getFinishDate()
    {
        return $this->finishDate;
    }

    /**
     * @param mixed $finishDate
     */
    public function setFinishDate($finishDate)
    {
        $this->finishDate = $finishDate;
    }

    /**
     * @return mixed
     */
    public function getCourseKnowledge()
    {
        return $this->courseKnowledge;
    }

    /**
     * @param mixed $courseKnowledge
     */
    public function setCourseKnowledge(Knowledge $courseKnowledge)
    {
        $this->courseKnowledge = $courseKnowledge;
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
    public function setUsers($users)
    {
        $this->users = $users;
    }

    public function addUser(User $arrayUser)
    {
        foreach($arrayUser as $user)
        {
            $this->users->add($user);
        }
    }
}