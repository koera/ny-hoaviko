<?php
/**
 * Created by PhpStorm.
 * User: trustylabs
 * Date: 12/1/18
 * Time: 10:00 AM
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Abonner;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class RegisterController extends Controller
{
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/registration",name="registration")
     */
    public function registrationAction(Request $request){
        $abonner = new Abonner();
        $form = $this->createForm('AppBundle\Form\AbonnerType', $abonner);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $abonner->setCode('US'.$abonner->getId());

            $password = $this->get('security.password_encoder')
                ->encodePassword($abonner, $abonner->getPassword());
            $abonner->setPassword($password);

            $em->persist($abonner);
            $em->flush();
//            return $this->redirectToRoute('user_show', array('id' => $user->getId()));
            return $this->redirectToRoute('homepage');
        }

        return $this->render('registration/registration.html.twig',array(
            'user' => $abonner,
            'form' => $form->createView(),
        ));
    }

}