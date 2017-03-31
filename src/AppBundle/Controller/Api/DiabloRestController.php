<?php

namespace AppBundle\Controller\Api;

use AppBundle\BlizzardClient;
use FOS\RestBundle\View\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Service\Diablo;
use FOS\RestBundle\Controller\Annotations as Rest; // alias pour toutes les annotations

/**
 * Class DiabloRestController
 * @package AppBundle\Controller\Api
 */
class DiabloRestController extends Controller
{
    /**
     * @Rest\Get("/profile/{battleTag}/hero/{heroId}", name="app_get_hero_profile")
     * @return View
     */
    public function getHeroProfile($battleTag, $heroId)
    {
        $client = new BlizzardClient('f7u2zdfnryd24xhvqpv4fdkjq9psj4jm', 'Tb6PXt6QCGfCt4pDbRt8yQX4rzB2HF5r');

        $diablo = new Diablo($client);

        $response = $diablo->getHeroProfile('Unic-21493', '90545425')->getBody();

        $view = View::create(['data' => $response], Response::HTTP_OK);
        $view->setFormat('json');

        return $view;
    }

}