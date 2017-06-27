<?php

namespace Workplace\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class PortalController extends Controller
{
    public function indexAction() : Response
    {
        return $this->render('WorkplaceWebBundle:Web:index.html.twig');
    }

    public function aboutAction() : Response
    {
        return $this->render('WorkplaceWebBundle:Web:about.html.twig');
    }
}
