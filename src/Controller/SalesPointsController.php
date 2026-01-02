<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class SalesPointsController extends AbstractController
{
    #[Route('/{_locale}/sales-points', name: 'app_sales_points')]
    public function index(): Response
    {
        return $this->render('pages/salesPoints.html.twig');
    }
}
