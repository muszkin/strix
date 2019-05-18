<?php


namespace App\Tests\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class IndexControllerTest extends WebTestCase
{
    public function testIndexAction()
    {
        $client = static::createClient();
        $crawler = $client->request("GET","/");

        $this->assertEquals(200,$client->getResponse()->getStatusCode());

        $this->assertGreaterThan(0,$crawler->filter("h1:contains('Strix')")->count());
    }
}