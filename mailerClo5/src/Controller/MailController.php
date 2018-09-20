<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
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
     * @Route("/mail", name="send_mail", methods={"POST"})
     */
    public function sendMail()
    {
//        return $this->json([
//            'message' => 'Welcome to your new controller!',
//            'path' => 'src/Controller/MailController.php',
//        ]);
        return new JsonResponse("test", 200);
    }

}
