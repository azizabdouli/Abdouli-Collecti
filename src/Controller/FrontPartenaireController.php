<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontPartenaireController extends AbstractController
{
    /**
     * @Route("/partenaire", name="front_partenaire")
     */
    public function index(): Response
    {
        // Récupérer ici les informations nécessaires pour la page frontPartenaire.html.twig
        $informations = array(
            'title' => 'Page Partenaire',
            'description' => 'Bienvenue sur la page Partenaire',
            // Ajoutez ici les informations que vous souhaitez transmettre à la vue
        );

        // Rendre la vue en passant les informations récupérées
        return $this->render('frontPartenaire.html.twig', [
            'informations' => $informations,
        ]);
    }
    #[Route(path: '/', name: 'home')]
    public function back(): Response
    {
        // ...

        return $this->redirectToRoute('app_login');
    }
}
