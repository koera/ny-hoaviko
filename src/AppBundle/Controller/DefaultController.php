<?php

namespace AppBundle\Controller;

use AppBundle\Entity\AbonnerReponse;
use AppBundle\Entity\Questionnaire;
use AppBundle\Entity\Reponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/questionnaire", name="homepage")
     */
    public function indexAction(Request $request)
    {
        if (!$this->getUser()) {
            return $this->redirectToRoute('login');
        }

        $questions = $this->getDoctrine()->getRepository(Questionnaire::class)
            ->findAll();
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'questions' => $questions
        ]);
    }


    /**
     * @param Request $request
     * @return Response
     * @Route("/answer",name="answer")
     * @throws \Exception
     */
    public function answerAction(Request $request)
    {
        if (!$this->getUser()) {
            return $this->redirectToRoute('login');
        }
        $em = $this->getDoctrine()->getManager();
        foreach ($request->request->all() as $key => $value) {
            $answer = new AbonnerReponse();
            $answer->setAbonner($this->getUser())
                ->setDate(new \DateTime())
                ->setReponse($em->getRepository(Reponse::class)->find($request->get($key)));
            $em->persist($answer);
        }
        $em->flush();
        return $this->render('default/answer.html.twig');

    }

}
