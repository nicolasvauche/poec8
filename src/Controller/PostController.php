<?php

namespace App\Controller;

use App\Entity\Post;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    #[Route('/article/{id}', name: 'app_post_index')]
    public function index(Post $post = null): Response
    {
        return $this->render('post/index.html.twig', [
            'post' => $post && $post->isIsActive() ? $post : null,
        ]);
    }

    #[Route('/article/modifier/{id}', name: 'app_post_edit')]
    public function edit(Post $post = null): Response
    {
        if ($post && ($this->isGranted('ROLE_ADMIN') || $post->getUser() === $this->getUser())) {
            return $this->render('post/edit.html.twig', [
                'post' => $post,
            ]);
        } else {
            throw new AccessDeniedException('Accès interdit', 404);
        }
    }
}
