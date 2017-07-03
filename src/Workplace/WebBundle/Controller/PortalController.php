<?php

namespace Workplace\WebBundle\Controller;

use Symfony\Component\HttpFoundation\Response;

class PortalController extends DefaultController
{
    public function indexAction() : Response
    {
        return $this->renderTemplate('WorkplaceWebBundle:Web:index.html.twig');
    }

    public function aboutAction() : Response
    {
        return $this->renderTemplate('WorkplaceWebBundle:Web:about.html.twig');
    }
}
