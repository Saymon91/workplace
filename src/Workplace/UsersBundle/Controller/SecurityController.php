<?php
namespace Workplace\UsersBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\{ Request, Response };
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;


class SecurityController extends Controller
{
    public function loginAction(Request $request, AuthenticationUtils $authUtils) : Response
    {
        // get the login error if there is one
        $error = $authUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authUtils->getLastUsername();

        return $this->redirect('WorkplaceUsersBundle:Security:login.html.twig', [
            'last_username' => $lastUsername,
            'error'         => $error,
        ]);
    }
}