<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TwitterController extends AbstractController
{
    /**
     * @Route("/", name="twitter")
     */
    public function index(Request $request,ObjectManager $manager)
    {
        $user = new User();
        $formUser = $this->createFormBuilder($user)
            ->add('identifiant')
            ->add('password')
            ->getForm();
        $formUser->handleRequest($request);

        return $this->render('twitter/index.html.twig',['formUser' =>$formUser->createView()]);
    }
}
