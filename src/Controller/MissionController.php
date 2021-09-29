<?php

namespace App\Controller;

use App\Entity\Mission;
use App\Repository\MissionRepository;
use App\Repository\MissionStatusRepository;
use Psr\Container\ContainerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class MissionController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(Environment $twig, MissionRepository $missionRepository): Response
    {
        return new Response($twig->render('mission/index.html.twig', [
            'missions' => $missionRepository->findAll(),
        ]));
    }

    /**
     * @Route ("/mission/{id}", name="mission")
     */
    public function show(Environment $twig, Mission $mission, MissionRepository $missionRepository): Response
    {
        return new Response($twig->render('mission/show.html.twig', [
            'mission' => $mission,
        ]));
    }
}
