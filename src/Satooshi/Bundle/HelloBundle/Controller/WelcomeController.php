<?php

namespace Satooshi\Bundle\HelloBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class WelcomeController extends Controller
{
    /**
     * @Route("/", name="_hello_welcome_index")
     *
     * @return string
     */
    public function indexAction()
    {
        return new Response('hello');
    }
}
