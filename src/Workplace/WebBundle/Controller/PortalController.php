<?php

namespace Workplace\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class PortalController extends Controller
{
    const main_menu = [
        'portal_homepage' => 'home',
        'portal_about'    => 'about',
        'portal_contacts' => 'contacts'
    ];

    protected function renderTemplate(string $template, array $content = array()) : Response
    {
        $parameters = [
            'main_menu' => $this::main_menu,
            'i18n'      => [
                'home'     => 'Домашняя страница',
                'about'    => 'О продукте',
                'contacts' => 'Контактные данные'
            ],
            'content' => $content
        ];

        return $this->render($template, $parameters);
    }
    public function indexAction() : Response
    {
        return $this->renderTemplate('WorkplaceWebBundle:Web:index.html.twig');
    }

    public function aboutAction() : Response
    {
        return $this->renderTemplate('WorkplaceWebBundle:Web:about.html.twig');
    }
}
