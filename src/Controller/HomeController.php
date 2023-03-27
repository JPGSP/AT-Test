<?php

namespace App\Controller;

use App\Form\SearchFormType;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @param ProductRepository $productRepository
     */
    public function __construct(
        private ProductRepository $productRepository
    ) {}

    #[Route('/', name: 'app_home')]
    public function index(Request $request): Response
    {
        $form = $this->createForm(SearchFormType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $dataReceived = ($form->getData()) ?
                $form->getData()['title'] :
                '';

            $products = $this->productRepository->getData($dataReceived);
        }

        return $this->render('home/index.html.twig', [
            'searchForm' => $form->createView(),
            'dataApi'    => (isset($products) && $products->hasProducts()) ?
                $products->getProducts()
                : ''
        ]);
    }
}
