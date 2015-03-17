<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Project;
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

    /**
     * @Route("/data/projects.json", name="data_projects")
     */
    public function projectsAction()
    {
        /** @var \Clastic\AliasBundle\Entity\Alias $alias */
        $records = $this->getDoctrine()->getRepository('AppBundle:Project')->findAll();

        $records = array_map(function(Project $item) {
            return array(
                'id' => $item->getNode()->getId(),
                'title' => $item->getNode()->getTitle(),
                'description' => $item->getDescription(),
            );
        }, $records);

        for ($i = 0; $i < 70; $i++) {
            $records[] = array(
                'id' => $records[0]['id'],
                'title' => $records[0]['title'] . ' = ' . $i,
                'description' => $records[0]['description'],
            );
        }

        return new JsonResponse($records);
    }
}
