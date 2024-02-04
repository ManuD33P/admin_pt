<?php

namespace AppBundle\Controller;
use AppBundle\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class ProductController extends Controller
{
    /**
     * @Route("/product/create", name="create_product")
     */
    public function createProduct(Request $request)
    {

        $data = json_decode($request->getContent(), true);
        $name = $data['name'];
        $categoryId = $data['category'];
        $image = $data['image'];

        $category = $this->getDoctrine()->getRepository(\AppBundle\Entity\Category::class)->find($categoryId);


        $product = new Product();
        $product->setName($name);
        $product->setImage($image);
        $product->setCategory($category);

        $em = $this->getDoctrine()->getManager();
        $em->persist($product);
        $em->flush();
        return new Response('Product is created: '.$product->getName());
    }


    /**
     * @Route("/product/all", name="all_products")
     */

    public function getAllProducts()
    {
        $products = $this->getDoctrine()->getRepository(\AppBundle\Entity\Product::class)->findAll();
        return $this->render('AppBundle:Default:products.html.twig', [
            'products' => $products,
        ]);
    }
}
