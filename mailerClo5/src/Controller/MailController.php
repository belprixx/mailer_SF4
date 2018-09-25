<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class MailController extends Controller
{
    /**
     * @Route("/mail", name="mail")
     */
    public function index()
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/MailController.php',
        ]);
    }

    /**
     * @Route("/send_mail", name="send_mail", methods={"POST"})
     */
    public function sendMail(Request $request, \Swift_Mailer $mailer)
    {
        $recipent = $request->request->get("recipent");
        $content = $request->request->get("content");
        $subject = $request->request->get("subject");
        $message = (new \Swift_Message($subject))
                    ->setFrom($this->container->getParameter('fromMail'))
                    ->setTo($recipent)
                    ->setBody(
                        $this->renderView(
                            "emails/$content.html.twig"
                        ),
                        'text/html'
                    );
       if ($mailer->send($message) == true) {
           return new JsonResponse("E-mail send to $recipent", 200);
       }
       else {
           return new JsonResponse("E-mail not to $recipent", 400);
       }

    }

}
