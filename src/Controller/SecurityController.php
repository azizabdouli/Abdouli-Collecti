<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    #[Route(path: '/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils, Security $security): Response

    {
        if ($this->getUser()) {
            $roles = $security->getUser()->getRoles();
            if (in_array('ROLE_Partenaire', $roles)) {
                return $this->redirectToRoute('front_partenaire');
            } elseif (in_array('ROLE_Collecteur', $roles)) {
                return $this->redirectToRoute('app_home');
            }
        }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        
    $this->get('session')->invalidate();
    $this->get('security.token_storage')->setToken(null);
    $this->get('request_stack')->getCurrentRequest()->getSession()->invalidate();
    $this->addFlash('success', 'Vous avez été déconnecté.');
    $this->redirectToRoute('app_login');
    }
     
      #[Route("/forgot-password", name:"app_forgot_password")]
     
    public function forgotPassword(Request $request)
    {
        // ...
    }
}
