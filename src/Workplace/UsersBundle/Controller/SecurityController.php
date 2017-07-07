<?php
namespace Workplace\UsersBundle\Controller;

use Symfony\Component\HttpFoundation\{ Request, Response };
use FOS\UserBundle\Controller\SecurityController as FOSSecurityController;


class SecurityController extends FOSSecurityController
{
    public function renderLogin(array $data) : Response
    {
        return $this->render('WorkplaceUsersBundle:Security:login.html.twig', $data);
    }
}