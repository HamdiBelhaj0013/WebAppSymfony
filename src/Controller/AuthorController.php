<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AuthorController extends AbstractController
{
    #[Route('/ShowAuthor/{name}', name: 'ShowAuthor')]
    public function showAuthor(string $name): Response
    {
        return $this->render('author/show.html.twig', [
            'name' => $name
        ]);
    }

    #[Route('/listAuthors', name: 'listAuthors')]
    public function listAuthors(): Response
    {
        $authors = array(
            array('id' => 1, 'picture' => '/images/Victor_Hugo.jpg', 'username' => 'Victor Hugo', 'email' => 'victor.hugo@gmail.com', 'nb_books' => 100),
            array('id' => 2, 'picture' => '/images/william_shakespeare.jpg', 'username' => 'William Shakespeare', 'email' => 'william.shakespeare@gmail.com', 'nb_books' => 200),
            array('id' => 3, 'picture' => '/images/Taha_Hussein.jpg', 'username' => 'Taha Hussein', 'email' => 'taha.hussein@gmail.com', 'nb_books' => 300),
        );

        return $this->render('author/list.html.twig', [
            'authors' => $authors
        ]);
    }

    #[Route('/authorDetails/{id}', name: 'authorDetails')]
    public function authorDetails(int $id): Response
    {

        $authors = array(
            array('id' => 1, 'picture' => '/images/Victor_Hugo.jpg', 'username' => 'Victor Hugo', 'email' => 'victor.hugo@gmail.com', 'nb_books' => 100),
            array('id' => 2, 'picture' => '/images/william_shakespeare.jpg', 'username' => 'William Shakespeare', 'email' => 'william.shakespeare@gmail.com', 'nb_books' => 200),
            array('id' => 3, 'picture' => '/images/Taha_Hussein.jpg', 'username' => 'Taha Hussein', 'email' => 'taha.hussein@gmail.com', 'nb_books' => 300),
        );


        $selectedAuthor = null;
        foreach ($authors as $author) {
            if ($author['id'] === $id) {
                $selectedAuthor = $author;
                break;
            }
        }

        if (!$selectedAuthor) {
            throw $this->createNotFoundException('Auteur introuvable.');
        }

        return $this->render('author/showAuthor.html.twig', [
            'author' => $selectedAuthor
        ]);
    }
}
