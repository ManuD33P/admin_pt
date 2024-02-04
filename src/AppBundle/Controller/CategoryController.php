<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Category;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class CategoryController extends Controller
{
    /**
     * @Route("/category/create", name="create_category")
     * @Method({"POST"})
    */
    public function createCategory(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        
        if (empty($data['name'])) {
            return new Response('El nombre no puede estar vacío', 400);
        }

        $name = $data['name'];
        $icon = $data['icon'];

        $category = new Category();
        $category->setName($name);
        $category->setIcon($icon);
        $em = $this->getDoctrine()->getManager();
        $em->persist($category);
        $em->flush();
        return new Response('Category is created: '.$category->getName());
    }

    
}
