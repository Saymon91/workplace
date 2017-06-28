<?php

namespace Workplace\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class PortalController extends Controller
{
    const main_menu = [
        ['url' => 'workplace_web_portal_about', 'text' => 'about'],
        ['url' => 'workplace_web_portal_contacts', 'text' => 'contacts']
    ];
    public function indexAction() : Response
    {
        return $this->render('WorkplaceWebBundle:Web:index.html.twig', ['main_menu' => $this::main_menu]);
    }

    public function aboutAction() : Response
    {
        return $this->render('WorkplaceWebBundle:Web:about.html.twig');
    }
}
