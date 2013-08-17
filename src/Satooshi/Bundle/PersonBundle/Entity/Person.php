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
     * @ORM\Column(name="name", type="string", length=50)
     *
     * @var string
     */
    protected $name;

    /**
     * @ORM\Column(name="email", type="string", length=50)
     *
     * @var string
     */
    protected $email;
}
