<?php

namespace App\Service;

use Symfony\Bridge\Twig\Mime\TemplatedEmail;

class SendMailService
{
    private $mailer;

    public function __construct(\Swift_Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function send($name, string $from, string $to): void
    {

        // on crée le mail
        $message = (new \Swift_Message())
            ->setFrom($from)
            ->setTo($to)
            ->setBody(
                //$this->renderView(
                //'html.twig',
                // ['name' => $name]
                //),
                'text\html'
            )
            ->addPart(
                //$this->renderView(
                //   'tkt.twig',
                //   ['name' => $name]
                //),
                'text/plain'
            );

        $this->mailer->send($message);
    }
}
