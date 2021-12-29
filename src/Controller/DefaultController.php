<?php declare(strict_types=1);

namespace App\Controller;

use App\Skills\BikeSkillList;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/{slug}", name="page")
     */
    public function page(string $slug = 'index', BikeSkillList $skillList): Response
    {
        $templateName = sprintf('content/%s.html.twig', $slug);

        return $this->render($templateName, [
            'skills' => $skillList,
        ]);
    }
}
