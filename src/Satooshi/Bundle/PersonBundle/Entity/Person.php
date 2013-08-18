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
     * @ORM\ManyToMany(targetEntity="Person")
     * @ORM\JoinTable(
     *     name="person_friendship",
     *     joinColumns={@ORM\JoinColumn(name="person_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="friend_id", referencedColumnName="id")}
     * )
     *
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    protected $friends;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->friends = new ArrayCollection();
    }

    public function __toString()
    {
        return sprintf("%s - %s", $this->name, $this->email);
    }

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

    /**
     * Add friend.
     *
     * @param Person $friend
     *
     * @return Person
     */
    public function addFriend(Person $friend)
    {
        $this->friends[] = $friend;

        return $this;
    }

    /**
     * Remove friend.
     *
     * @param Person $friend
     *
     * @return Person
     */
    public function removeFriend(Person $friend)
    {
        $this->friends->removeElement($friend);

        return $this;
    }

    /**
     * Set friends.
     *
     * @param array $friends
     *
     * @return \Satooshi\Bundle\PersonBundle\Entity\Person
     */
    public function setFriends($friends)
    {
        $this->friends = new ArrayCollection();

        foreach ($friends as $friend) {
            $this->addFriend($friend);
        }

        return $this;
    }

    /**
     * Return friends.
     *
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getFriends()
    {
        return $this->friends;
    }
}
