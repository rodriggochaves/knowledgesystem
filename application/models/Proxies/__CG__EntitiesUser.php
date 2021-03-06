<?php

namespace DoctrineProxies\__CG__\Entities;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class User extends \Entities\User implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = array();



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return array('__isInitialized__', '' . "\0" . 'Entities\\User' . "\0" . 'id', '' . "\0" . 'Entities\\User' . "\0" . 'firstName', '' . "\0" . 'Entities\\User' . "\0" . 'lastName', '' . "\0" . 'Entities\\User' . "\0" . 'email', '' . "\0" . 'Entities\\User' . "\0" . 'password', '' . "\0" . 'Entities\\User' . "\0" . 'profile', '' . "\0" . 'Entities\\User' . "\0" . 'userKnowledge', '' . "\0" . 'Entities\\User' . "\0" . 'courses');
        }

        return array('__isInitialized__', '' . "\0" . 'Entities\\User' . "\0" . 'id', '' . "\0" . 'Entities\\User' . "\0" . 'firstName', '' . "\0" . 'Entities\\User' . "\0" . 'lastName', '' . "\0" . 'Entities\\User' . "\0" . 'email', '' . "\0" . 'Entities\\User' . "\0" . 'password', '' . "\0" . 'Entities\\User' . "\0" . 'profile', '' . "\0" . 'Entities\\User' . "\0" . 'userKnowledge', '' . "\0" . 'Entities\\User' . "\0" . 'courses');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (User $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', array());
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', array());
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function arrayToObject($arr)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'arrayToObject', array($arr));

        return parent::arrayToObject($arr);
    }

    /**
     * {@inheritDoc}
     */
    public function objectToArray()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'objectToArray', array());

        return parent::objectToArray();
    }

    /**
     * {@inheritDoc}
     */
    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', array());

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function setId($id)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setId', array($id));

        return parent::setId($id);
    }

    /**
     * {@inheritDoc}
     */
    public function getEmail()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEmail', array());

        return parent::getEmail();
    }

    /**
     * {@inheritDoc}
     */
    public function setEmail($email)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEmail', array($email));

        return parent::setEmail($email);
    }

    /**
     * {@inheritDoc}
     */
    public function getPassword()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPassword', array());

        return parent::getPassword();
    }

    /**
     * {@inheritDoc}
     */
    public function setPassword($password)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPassword', array($password));

        return parent::setPassword($password);
    }

    /**
     * {@inheritDoc}
     */
    public function getProfile()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getProfile', array());

        return parent::getProfile();
    }

    /**
     * {@inheritDoc}
     */
    public function setProfile($profile)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setProfile', array($profile));

        return parent::setProfile($profile);
    }

    /**
     * {@inheritDoc}
     */
    public function getFirstName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFirstName', array());

        return parent::getFirstName();
    }

    /**
     * {@inheritDoc}
     */
    public function setFirstName($firstName)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFirstName', array($firstName));

        return parent::setFirstName($firstName);
    }

    /**
     * {@inheritDoc}
     */
    public function getLastName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLastName', array());

        return parent::getLastName();
    }

    /**
     * {@inheritDoc}
     */
    public function setLastName($lastName)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLastName', array($lastName));

        return parent::setLastName($lastName);
    }

    /**
     * {@inheritDoc}
     */
    public function getUserKnowledge()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUserKnowledge', array());

        return parent::getUserKnowledge();
    }

    /**
     * {@inheritDoc}
     */
    public function setUserKnowledge(\Entities\Knowledge $userKnowledge)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUserKnowledge', array($userKnowledge));

        return parent::setUserKnowledge($userKnowledge);
    }

    /**
     * {@inheritDoc}
     */
    public function getCourses()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCourses', array());

        return parent::getCourses();
    }

    /**
     * {@inheritDoc}
     */
    public function setCourses($courses)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCourses', array($courses));

        return parent::setCourses($courses);
    }

    /**
     * {@inheritDoc}
     */
    public function addKnowledge($knowledge)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addKnowledge', array($knowledge));

        return parent::addKnowledge($knowledge);
    }

}
