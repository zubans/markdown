<?php

namespace App\Controller;

use App\Service\ConvertText;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TextController extends AbstractController
{
    #[Route('/text', name: 'app_text')]
    public function index(Request $request): Response
    {
        return $this->render('index.html.twig');
    }

    #[Route('/convert', name: 'app_convert')]
    public function convert(Request $request): Response
    {
        return new Response((new ConvertText())->convert($request->request->all()['message']));
    }
}
