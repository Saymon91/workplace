<?php

namespace Workplace\WebBundle\Controller;

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\HttpFoundation\{Response, Request};

class PortalController extends DefaultController
{
    public function indexAction(): Response
    {
        return $this->renderTemplate('WorkplaceWebBundle:Web:index.html.twig');
    }

    public function aboutAction(): Response
    {
        return $this->renderTemplate('WorkplaceWebBundle:Web:about.html.twig');
    }

    public function userAction() : Response
    {
        $user = $this->getUser();
        print('<pre>');
        print_r($user);
        print('</pre>');
        // return $this->renderTemplate('WorkplaceWebBundle:Web:user.html.twig');
    }

    public function routesAction() : Response
    {
        $routes = $this->get('router');
        print('<pre>');
        print_r($routes->get('routes'));
        print('</pre>');
    }
}
