<?php


namespace App\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Routing\Annotation\Route;

class IndexController
{
    /**
     * @return array
     * @Route("/",name="index")
     * @Template("Index/index.html.twig")
     */
    public function indexAction()
    {
        phpinfo();
        return [];
    }
}