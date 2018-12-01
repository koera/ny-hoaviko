<?php
/**
 * Created by PhpStorm.
 * User: trustylabs
 * Date: 12/1/18
 * Time: 9:41 AM
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class SecurityController extends Controller
{

    /**
     * @param Request $request
     * @Route("/",name="login")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function loginAction(Request $request){

        $authenticationUtils = $this->get('security.authentication_utils');

        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', array(
            'last_username' => $lastUsername,
            'error'         => $error,
        ));
    }

    /**
     * @return Response
     *
     * @Route("/login-check", name="loginCheck")
     */
    public function loginCheckAction(Request $request){

    }


    /**
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     *
     * @Route("/logout", name="logout")
     */
    public function logoutAction(){
        $this->get('security.token_storage')->setToken(null);
        $this->get('request')->getSession()->invalidate();
        return $this->redirectToRoute('login');
    }

    /**
     * Redirect after login page
     *
     * @Route("/redirect-login",name="redirect-login")
     */
    public function redirectAction(Request $request){
        return $this->redirectToRoute("homepage");
    }




}