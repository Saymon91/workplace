<?php
/**
 * Created by PhpStorm.
 * User: sam
 * Date: 03.07.17
 * Time: 22:25
 */

namespace Workplace\WebBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller {
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
}