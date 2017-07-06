<?php
namespace Workplace\UsersBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\{ Request, Response };
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Workplace\UsersBundle\Form\UserType;


class SecurityController extends Controller
{
    public function loginAction(Request $request, AuthenticationUtils $authUtils) : Response
    {
        die('AAAAAAAAA');
        // get the login error if there is one
        $error = $authUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authUtils->getLastUsername();

        return $this->render('WorkplaceUsersBundle:Security:login.html.twig', [
            'last_username' => $lastUsername,
            'error'         => $error,
        ]);
    }

    public function registerAction() : Response
    {
        $form = new UserType();
        return $this->render('WorkplaceUsersBundle:Security:register.html.twig', ['form' => $form]);
    }
}