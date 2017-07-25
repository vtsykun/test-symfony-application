<?php

namespace Okvpn\Bundle\LoggerCollectorBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="log_index")
     * @Template()
     */
    public function indexAction()
    {
        $this->get('logger')->warning(1);
        return [];
    }

    /**
     * @Route("/test", name="log_test")
     * @Template()
     */
    public function testAction()
    {
        $this->get('logger')->warning(2);
        return ['from' => 70, 'to' => 140];
    }

    /**
     * @Route("/widget/{id}", name="log_widget", requirements={"id"="\d+"}, defaults={"id"=0})
     * @Template()
     */
    public function widgetAction($id)
    {
        $startId = $id;
        while ($startId--) {
            $this->get('logger')->warning('sub' . $id);
        }

        return ['id' => $id];
    }
}
