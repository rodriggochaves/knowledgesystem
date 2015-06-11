<?php
/**
 * Created by PhpStorm.
 * User: rodrigochaves
 * Date: 31/05/15
 * Time: 20:51
 */

namespace Entities;

/**
 * Class User
 * @package Entities
 * @Entity
 * @Table(name="User")
 */
class User {

    /**
     * @Id
     * @Column(name="idUser", type="integer", nullable=false)
     * @GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @Column(name="firstName")
     */
    private $firstName;

    /**
     * @Column(name="lastName")
     */
    private $lastName;

    /**
     * @Column(name="email")
     */
    private $email;

    /**
     * @Column(name="password")
     */
    private $password;

    /**
     * @OneToMany(targetEntity="Profile")
     * @Column(name="Profile_idProfile")
     */
    private $profile;

    public static function getPath()
    {
        return '\Entities\User';
    }

    public function arrayToObject($arr)
    {
        $this->firstName = $arr['firstName'];
        $this->lastName = $arr['lastName'];
        $this->email = $arr['email'];
        $this->password = $arr['password'];
        $this->profile = $arr['profile'];
        $this->id = $arr['id'];
    }

    public function objectToArray()
    {
        return array(
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'email' => $this->email,
            'password' => $this->password,
            'profile' => $this->profile
        );
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
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getProfile()
    {
        return $this->profile;
    }

    /**
     * @param mixed $profile
     */
    public function setProfile($profile)
    {
        $this->profile = $profile;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }
}