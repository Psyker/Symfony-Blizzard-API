<?php

namespace AppBundle\Controller;

use AppBundle\BlizzardClient;
use AppBundle\Service\Diablo;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $client = new BlizzardClient('f7u2zdfnryd24xhvqpv4fdkjq9psj4jm', 'Tb6PXt6QCGfCt4pDbRt8yQX4rzB2HF5r');

        $diablo = new Diablo($client);

        $response = $diablo->getHeroProfile('Unic-21493', '90545425');


        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'body' => $response->getBody()
        ]);
    }
}
