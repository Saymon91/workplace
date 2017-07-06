<?php

namespace Workplace\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    public function indexAction()
    {
        return $this->render('WorkplaceAdminBundle:Admin:index.html.twig', [
            // ...
        ]);
    }

}
