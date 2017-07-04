<?php

namespace Workplace\UsersBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('WorkplaceUsersBundle:Default:index.html.twig');
    }
}
