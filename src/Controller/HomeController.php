<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\EventRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="wild_index")
     */
    public function index(EventRepository $eventRepository): Response
    {
        return $this->render('wild/welcome.html.twig', [
            "events" => $eventRepository->findAll(),
        ]);
    }

    /**
     * @Route("/user/events", name="user_events")
     */
    public function events(EventRepository $eventRepository): Response
    {
        return $this->render('wild/user_events.html.twig', [
            "events" => $eventRepository->findAll(),
        ]);
    }

    /**
     * @Route("/user/artists", name="user_artists")
     */
    public function artists(): Response
    {
        return $this->render('wild/user_artists.html.twig');
    }

    /**
     * @Route("/user/categories", name="user_categories")
     */
    public function categories(CategoryRepository $categoryRepository): Response
    {
        return $this->render('wild/user_categories.html.twig', [
            "categories" => $categoryRepository->findAll(),
        ]);
    }

    /**
     * @Route("/user/agenda", name="user_agenda")
     */
    public function agenda(): Response
    {
        return $this->render('wild/user_agenda.html.twig');
    }

    /**
     * @Route("/user/details", name="user_details")
     */
    public function details(): Response
    {
        return $this->render('wild/user_details.html.twig');
    }

    /**
     * @Route("/user/contact", name="user_contact")
     */
    public function contact(): Response
    {
        return $this->render('wild/user_contact.html.twig');
    }
}
