<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;

class SendMailTest extends TestCase
{
    public function testSendMail()
    {
        $postParameters =  array('recipent' => 'etna.clo5@gmail.com',
            'content'=>'Test_unitaire',
            'subject'=>'Test_unitaire',
        );

        $ch = curl_init();
        $fields = array( 'recipent'=>"etna.clo5@gmail.com", 'content'=>'Test_unitaire', 'subject'=>"Test_unitaire");
        $postvars = '';
        foreach($fields as $key=>$value) {
            $postvars .= $key . "=" . $value . "&";
        }
        $url = 'localhost/send_mail';
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_POST, 1);                //0 for a get request
        curl_setopt($ch,CURLOPT_POSTFIELDS,$postvars);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch,CURLOPT_CONNECTTIMEOUT ,3);
        curl_setopt($ch,CURLOPT_TIMEOUT, 20);
        $response = curl_exec($ch);
        curl_close ($ch);

        if ($response == '"E-mail send to etna.clo5@gmail.com"'){
            $this->assertTrue(true);
        }
        else {
            $this->assertFalse(false);
        }


    }
}
