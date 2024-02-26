<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class Twig extends AbstractController{
    /* These are annotations */
    /**
     * @Route("/twig")
     */
    
    public function user(): Response{
        $user_name = "User";
        $topics = ["Twig", "Vue Integration","Database"];
        return $this->render('starters/index.html.twig', [
            'user_name' => $user_name,
            'topics' => $topics
        ]);
    }

}