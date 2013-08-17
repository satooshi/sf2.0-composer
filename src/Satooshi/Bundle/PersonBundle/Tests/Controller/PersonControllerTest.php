<?php

namespace Satooshi\Bundle\PersonBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PersonControllerTest extends WebTestCase
{
    public function testCompleteScenario()
    {
        // Create a new client to browse the application
        $client = static::createClient();

        // Create a new entry in the database
        $crawler = $client->request('GET', '/person/');
        $this->assertTrue(200 === $client->getResponse()->getStatusCode());
        $crawler = $client->click($crawler->selectLink('Create a new entry')->link());

        // Fill in the form and submit it
        $form = $crawler->selectButton('Create')->form(array(
            'satooshi_bundle_personbundle_persontype[name]'  => 'your name TEST',
            'satooshi_bundle_personbundle_persontype[email]' => 'test@example.com',
        ));

        $client->submit($form);
        $crawler = $client->followRedirect();

        // Check data in the show view
        $this->assertTrue($crawler->filter('td:contains("your name TEST")')->count() > 0);
        $this->assertTrue($crawler->filter('td:contains("test@example.com")')->count() > 0);

        // Edit the entity
        $crawler = $client->click($crawler->selectLink('Edit')->link());

        $form = $crawler->selectButton('Edit')->form(array(
            'satooshi_bundle_personbundle_persontype[name]'  => 'your name',
            'satooshi_bundle_personbundle_persontype[email]' => 'email@example.com',
        ));

        $client->submit($form);
        $crawler = $client->followRedirect();

        // Check the element contains an attribute with value equals "Foo"
        $this->assertTrue($crawler->filter('[value="your name"]')->count() > 0);
        $this->assertTrue($crawler->filter('[value="email@example.com"]')->count() > 0);

        // Delete the entity
        $client->submit($crawler->selectButton('Delete')->form());
        $crawler = $client->followRedirect();

        // Check the entity has been delete on the list
        $this->assertNotRegExp('/your name/', $client->getResponse()->getContent());
        $this->assertNotRegExp('/email@example.com/', $client->getResponse()->getContent());
    }
}
