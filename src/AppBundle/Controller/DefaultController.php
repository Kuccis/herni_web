<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{

  /**
   * @Route("/pdf", name="pdf")
   */
  public function pdfAction(Request $request)
  {


      $pdf = new \tFPDF();

      $pdf->AddPage();
      $pdf->SetFont('Arial','B',16);
      $pdf->Cell(40,10,'Text v PDF');

      return new Response($pdf->Output(), 200, array(
          'Content-Type' => 'application/pdf'));
  }


    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('base.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/logout")
     */
    public function logoutAction(Request $request)
    {

    }

    /**
     * @Route("/novot152")
     */
    public function indexAction2(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('cviceni12.html.twig');
    }

    /**
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request)
    {
      $authenticationUtils = $this->get('security.authentication_utils');

          // get the login error if there is one
          $error = $authenticationUtils->getLastAuthenticationError();

          // last username entered by the user
          $lastUsername = $authenticationUtils->getLastUsername();

          return $this->render(
              'default/login.html.twig',
              array(
                  // last username entered by the user
                  'last_username' => $lastUsername,
                  'error'         => $error,
              )
          );
    }
}
