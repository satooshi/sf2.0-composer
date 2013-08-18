<?php

namespace Satooshi\Bundle\PersonBundle\Tests\Entity;

use Satooshi\Bundle\PersonBundle\Entity\Person;

/**
 * @covers \Satooshi\Bundle\PersonBundle\Entity\Person
 *
 * @group unit
 * @group entity
 */
class PersonAccessorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Satooshi\Bundle\PersonBundle\Entity\Person
     */
    protected $obj;

    protected function setUp()
    {
        $this->obj = new Person();
    }

    public function testConstruction()
    {
        $this->assertNull($this->obj->getId());
        $this->assertNull($this->obj->getName());
        $this->assertNull($this->obj->getEmail());
        $this->assertFalse($this->obj->getIsMarried());
        $this->assertCount(0, $this->obj->getFriends());
    }

    public function testSetName()
    {
        $expected = 'name';

        $self = $this->obj->setName($expected);

        $this->assertEquals($this->obj->getName(), $expected);
        $this->assertSame($self, $this->obj);
    }

    public function testSetEmail()
    {
        $expected = 'email@example.com';

        $self = $this->obj->setEmail($expected);

        $this->assertEquals($this->obj->getEmail(), $expected);
        $this->assertSame($self, $this->obj);
    }

    public function testSetIsMarriedTrue()
    {
        $self = $this->obj->setIsMarried(true);

        $this->assertTrue($this->obj->getIsMarried());
        $this->assertSame($self, $this->obj);
    }

    public function testSetIsMarriedFalse()
    {
        $self = $this->obj->setIsMarried(false);

        $this->assertFalse($this->obj->getIsMarried());
        $this->assertSame($self, $this->obj);
    }

    public function testAddFriend()
    {
        $expected = new Person();

        $self = $this->obj->addFriend($expected);

        $this->assertCount(1, $this->obj->getFriends());

        $friends = $this->obj->getFriends();
        $this->assertSame($expected, $friends[0]);

        $this->assertSame($self, $this->obj);
    }

    public function testRemoveFriend()
    {
        $expected = new Person();

        $this->obj->addFriend($expected);
        $this->obj->removeFriend($expected);

        $this->assertCount(0, $this->obj->getFriends());
    }
}
