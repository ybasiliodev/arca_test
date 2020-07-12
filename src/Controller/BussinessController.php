<?php

namespace App\Controller;

use App\Entity\Bussiness;
use App\Entity\BussinessCategories;
use App\Repository\BussinessRepository;
use App\Repository\CategoryRepository;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class BussinessController extends AbstractController
{
    /**
     * @Route("/new_bussiness", name="new_bussiness")
     */
    public function index(BussinessRepository $bussinessRepository, CategoryRepository $categoryRepository) : Response
    {
        return $this->render('bussiness/new.html.twig', [
            'bussiness' => $bussinessRepository->findAll(),
            'categories' => $categoryRepository->findAllCategories()
        ]);
    }

    /**
     * @Route("/bussiness/search/", name="bussiness_search", methods={"GET"})
     */
    public function selectByName(BussinessRepository $bussinessRepository, Request $request)
    {
        $value = $request->get('search_value');
        $bussinessResult = $bussinessRepository->findbyText($value);
        
        return $this->render('bussiness/list.html.twig', [
            'bussiness' => array_slice($bussinessResult, 0, 10),
            'search_value' => $value,
            'admin' => false,
            'pages' => ceil(sizeOf($bussinessResult) / 10),
            'saved' => false
        ]);

    }

    /**
     * @Route("/bussiness/search/{page}/{value}", name="bussiness_search_page", methods={"GET"})
     */
    public function selectByPage(BussinessRepository $bussinessRepository, $page, $value = null)
    {
        if ($value) {
            $bussinessResult = $bussinessRepository->findbyText($value);
        } else {
            $bussinessResult = $bussinessRepository->findAllBussiness();
        }

        $limit = $page * 10;
        $start = $limit - 10;

        return $this->render('bussiness/list.html.twig', [
            'bussiness' => array_slice($bussinessResult, $start, $limit),
            'search_value' => null,
            'admin' => true,
            'pages' => ceil(sizeOf($bussinessResult) / 10),
            'saved' => false
        ]);
    }

    /**
     * @Route("/bussiness/details/", name="bussiness_details", methods={"GET"})
     */
    public function selectByID(BussinessRepository $bussinessRepository, Request $request)
    {
        $value = $request->get('id');
        $bussinessResult = $bussinessRepository->findBussinessByID($value);

        return $this->render('bussiness/detail.html.twig', [
            'bussiness' => $bussinessResult,
        ]);

    }

    /**
     * @Route("/create", name="create", methods={"POST"})
     */
    public function createBussiness(BussinessRepository $bussinessRepository, Request $request)
    {
        $bussiness = new Bussiness();
        $bussiness->setTitle($request->get('title'));
        $bussiness->setPhone($request->get('phone'));
        $bussiness->setAddress($request->get('address'));
        $bussiness->setZipcode($request->get('zip_code'));
        $bussiness->setCity($request->get('city'));
        $bussiness->setState($request->get('state'));
        $bussiness->setDescription($request->get('description'));

        try {
            $em = $this->getDoctrine()->getManager();
            $em->persist($bussiness);
            $em->flush();
        } catch (Exception $e) {
            echo 'An exception ocurred ',  $e->getMessage(), "\n";
        }

        foreach($request->get('categories') as $cat) {
            $bussinesCategories = new BussinessCategories();
            $bussinesCategories->setBussinessId($bussiness->getId());
            $bussinesCategories->setCategoryId($cat);

            try {
                $em = $this->getDoctrine()->getManager();
                $em->persist($bussinesCategories);
                $em->flush();
            } catch (Exception $e) {
                echo 'An exception ocurred ',  $e->getMessage(), "\n";
            }
        }

        $bussinessResult = $bussinessRepository->findAllBussiness();
        
        return $this->render('bussiness/list.html.twig', [
            'bussiness' => array_slice($bussinessResult, 0, 10),
            'search_value' => null,
            'admin' => true,
            'pages' => ceil(sizeOf($bussinessResult) / 10),
            'saved' => true
        ]);
    }

}
