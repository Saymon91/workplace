<?php

namespace Workplace\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('WorkplaceAdminBundle:Default:index.html.twig');
    }
}
