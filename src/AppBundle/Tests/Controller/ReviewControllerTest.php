<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ReviewControllerTest extends WebTestCase
{
    public function testReview()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/review');
    }
}
