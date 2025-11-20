<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class StudentController extends AbstractController
{
    #[Route('/student', name: 'app_student')]
    public function index(): Response
    {
        return new Response("Hello Student");
    }
    #[Route('/student/{id}', name: 'show_student', requirements: ['id'=>'\d+'])]
    public function showStudent($id): Response
    {
        return new Response("Hello Student number:".$id);
    }
    #[Route('/student/{name}', name: 'show_student_name')]
    public function showName($name): Response
    {
        return $this->render('student/student.html.twig',["name"=> $name]);
    }

    #[Route('/list', name: 'liste')]
    public function listEtudiant(): Response
    {
//liste etudiants
        $etudiants= array("ali", "Med");
        $modules = array(
            array("nom"=>"Symfony",
                "id"=>1,
                "enseignant"=>"Ali",
                "nbrHeures"=>42,
                "date"=>"12-12-2021"),
            array("nom"=>"JEE",
                "id"=>2,
                "enseignant"=>"Med",
                "nbrHeures"=>31,
                "date"=>"12-10-2021"),
            array("nom"=>"BD",
                "id"=>3,
                "enseignant"=>"Islem",
                "nbrHeures"=>21,
                "date"=>"12-09-2021")
        );
        return $this->render( 'student/list.html.twig',
            array('etudiants' => $etudiants,
                'listeModules' => $modules));
    }
    #[Route('/affectation', name: 'Affectation')]
    public function affecter(): Response
    {
        return $this->render(view: 'student/affecter.html.twig');
    }
    #[Route('/indexFils', name: 'index_fils')]
    public function indexFils(): Response
    {
        return $this->render(view: 'student/index.html.twig');
    }

}
