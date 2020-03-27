<?php

declare(strict_types=1);

namespace App\Controller;

use App\Form\Type\CountWordType;
use App\Service\WordCounter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class HomeController extends AbstractController
{
    /**
     * @var WordCounter
     */
    private $wordCounter;

    public function __construct(WordCounter $wordCounter)
    {
        $this->wordCounter = $wordCounter;
    }

    /**
     * @Route("/")
     */
    public function index(Request $request): Response
    {
        $form = $this->createForm(CountWordType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            return $this->render('home.html.twig', [
                'results' => $this->wordCounter->count($form->get('text')->getData()),
                'form' => $form->createView(),
            ]);
        }

        return $this->render('home.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
