<?php

namespace Workplace\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('WorkplaceWebBundle:Default:index.html.twig');
    }
}
