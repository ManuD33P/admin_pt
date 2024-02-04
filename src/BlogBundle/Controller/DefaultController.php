<?php

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/products", name="products_list")
     * @Method({"GET"})
     */
    public function indexAction()
    {
        $products =  [
            [
                "id" => 1,
                "name" => "product1",
                "price" => 100
            ],
            [
                "id" => 2,
                "name" => "product2",
                "price" => 200
            ]
        ];

        return $this->render('BlogBundle:Default:products.html.twig', ['products' => $products]);
    }
}