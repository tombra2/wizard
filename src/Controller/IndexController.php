<?php

namespace App\Controller;

use App\Service\DocumentFactory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class IndexController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    public function index(): Response
    {
        $data = DocumentFactory::fromCSV('INV-001;Rechnung Müller GmbH;2025-02-01;Invoice;1299.99');


        return $this->render('index/index.html.twig', [
            'data' => $data,
        ]);
    }
}
