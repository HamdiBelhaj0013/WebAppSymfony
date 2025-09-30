<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ServiceController extends AbstractController
{
    #[Route('/showService/{name}', name: 'showService')]
    public function showService(string $name): Response
    {
        return $this->render('service/index.html.twig', [
            'name' => $name,
        ]);
    }

    #[Route('/GoToIndex', name: 'GoToIndex')]
    public function GoToIndex()
    {
        return $this->redirectToRoute('home');
    }
}