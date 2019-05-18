<?php


namespace App\Controller;


use App\Entity\Trips;
use App\Services\PrepareReport;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class IndexController extends AbstractController
{
    /**
     * @param PrepareReport $prepareReport
     * @return array
     * @Route("/",name="index")
     * @Template("Index/index.html.twig")
     */
    public function indexAction(PrepareReport $prepareReport)
    {
        $tripsReport = [];
        $em = $this->getDoctrine()->getRepository(Trips::class);

        $trips = $em->findAll();

        if (!empty($trips)) {
            foreach ($trips as $trip) {
                $tripsReport[] = $prepareReport->prepareReportForTrip($trip);
            }
        }

        return ["tripsReport" => $tripsReport];
    }
}