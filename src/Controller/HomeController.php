<?php

declare(strict_types=1);

namespace App\Controller;

use App\Form\Type\CountWordType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class HomeController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function index(): Response
    {
        $form = $this->createForm(CountWordType::class);

        return $this->render('home.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
