<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DataController extends Controller
{
    /**
     * @Route("/data/page.json", name="data_page")
     */
    public function pageAction(Request $request)
    {
        /** @var \Clastic\AliasBundle\Entity\Alias $alias */
        $alias = $this->getDoctrine()->getRepository('ClasticAliasBundle:Alias')->findOneBy(array(
            'alias' => $request->query->get('alias'),
        ));

        $record = $this->get('clastic.node_manager')
            ->loadNode($alias->getNode()->getId());

        return new JsonResponse(array(
            'title' => $record->getNode()->getTitle(),
            'content' => $record->getBody(),
        ));
    }
}
