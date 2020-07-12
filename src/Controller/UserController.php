<?php

namespace App\Controller;

use App\Repository\BussinessRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/signup", name="signup")
     */
    public function signup(UserRepository $userRepository, Request $request)
    {
        return $this->render('user/signup.html.twig', [
            'incorrect' => false,
        ]);
    }

    /**
     * @Route("/login", name="login", methods={"GET"})
     */
    public function login(UserRepository $userRepository, BussinessRepository $bussinessRepository, Request $request)
    {
        $login = $request->get('login');
        $password = $request->get('password');
        $user = $userRepository->findByLogin($login, $password);        
        
        if($user) {
            $bussinessResult = $bussinessRepository->findAllBussiness();

            return $this->render('bussiness/list.html.twig', [
                'bussiness' => array_slice($bussinessResult, 0, 10),
                'search_value' => null,
                'admin' => true,
                'pages' => ceil(sizeOf($bussinessResult) / 10),
                'saved' => false
            ]);
        } else {
            return $this->render('user/signup.html.twig', [
                'incorrect' => true,
            ]);
        }
    }
}
