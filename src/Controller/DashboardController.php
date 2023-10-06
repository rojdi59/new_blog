<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DashboardController extends AbstractController
{
    #[Route('/dashboard', name: 'app_dashboard')]
    public function index(UserInterface $user): Response
    {
        return $this->render('dashboard/index.html.twig', [
            'controller_name' => $user->getNom(), '' , $user->getPrenom(),
        ]);
    }

}
