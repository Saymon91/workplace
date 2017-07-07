<?php

namespace Workplace\UsersBundle\Controller;
use Symfony\Component\HttpFoundation\{ Request, Response };
use FOS\UserBundle\Controller\ProfileController as FOSProfileController;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use FOS\UserBundle\Model\UserInterface;


class ProfileController extends FOSProfileController
{
    public function showAction() : Response
    {
        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        return $this->render('WorkplaceUsersBundle:Profile:view.html.twig', ['user' => $user]);
    }

}