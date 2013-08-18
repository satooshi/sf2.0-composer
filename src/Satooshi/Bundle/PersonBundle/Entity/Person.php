<?php

namespace Satooshi\Bundle\PersonBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Satooshi\Bundle\PersonBundle\Repository\PersonRepository")
 * @ORM\Table(name="person")
 *
 * @author KITAMURA Satoshi <with.no.parachute@gmail.com>
 */
class Person
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     * @var integer
     */
    protected $id;

    /**
     * @ORM\Column(name="name", type="string", length=50, nullable=false)
     *
     * @var string
     */
    protected $name;

    /**
     * @ORM\Column(name="email", type="string", length=50, nullable=false)
     *
     * @var string
     */
    protected $email;

    /**
     * @ORM\Column(name="is_married", type="boolean", nullable=false)
     *
     * @var boolean
     */
    protected $isMarried = false;

    /**
     * Return id.
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return Person
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Return name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set email.
     *
     * @param string $email
     *
     * @return Person
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Return email.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set isMarried.
     *
     * @param boolean $isMarried
     *
     * @return Person
     */
    public function setIsMarried($isMarried)
    {
        $this->isMarried = $isMarried;

        return $this;
    }

    /**
     * Return isMarried.
     *
     * @return boolean
     */
    public function getIsMarried()
    {
        return $this->isMarried;
    }
}
