<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Picture;
use Doctrine\Persistence\ManagerRegistry;

class HomeController extends AbstractController
{
    /**
     * Page d'accueil
     * 
     * @return Response
     */

    public function index(ManagerRegistry $doctrine): Response
    {
        // Toutes les photos
        $pictures = $doctrine->getRepository(Picture::class)->findAll();

        return $this->render('home/index.html.twig', [
            'pictures' => $pictures,
        ]);
    }
}
