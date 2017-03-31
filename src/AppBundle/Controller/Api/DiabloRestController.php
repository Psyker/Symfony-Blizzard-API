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
        $diablo = $this->createClient();
        $response = $diablo->getHeroProfile($battleTag, $heroId)->getBody();

        $view = View::create(['data' => $response], Response::HTTP_OK);
        $view->setFormat('json');

        return $view;
    }

    /**
     * @Rest\Get("/item/{id}", name="app_get_item_by_id")
     * @param $itemId
     * @return View
     */
    public function getItemDataById($itemId)
    {
        $diablo = $this->createClient();
        $response =  $diablo->getItemDataById($itemId);

        $view = View::create(['data' => $response], Response::HTTP_OK);
        $view->setFormat('json');

        return $view;
    }

    /**
     * @Rest\Get("/follower/{slug}", name="app_get_follower")
     * @param $follower
     * @return View
     */
    public function getFollowerData($follower)
    {
        $diablo = $this->createClient();
        $response = $diablo->getFollowerData($follower);

        $view = View::create(['data' => $response], Response::HTTP_OK);
        $view->setFormat('json');

        return $view;
    }

    /**
     * @Rest\Get("/profile/{battleTag}", name="app_get_profile")
     * @param $battleTag
     * @return View
     */
    public function getCareerProfile($battleTag)
    {
        $diablo = $this->createClient();
        $response = $diablo->getCareerProfile($battleTag);

        $view =  View::create(['data' => $response], Response::HTTP_OK);
        $view->setFormat('json');

        return $view;
    }

    public function createClient()
    {
        $client = new BlizzardClient(
            'f7u2zdfnryd24xhvqpv4fdkjq9psj4jm',
          'Tb6PXt6QCGfCt4pDbRt8yQX4rzB2HF5r'
        );

        return new Diablo($client);
    }

}