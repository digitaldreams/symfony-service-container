<?php

namespace App\Service;

use App\Entity\Product;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class NewProductCreatedNotification
{
    protected string $adminEmail;
    public string $emailFrom ;

    public function __construct(protected MailerInterface $mailer)
    {
    }

    public function setAdminEmail(string $adminEmail): self
    {
        $this->adminEmail = $adminEmail;

        return $this;
    }

    public function send(Product $product)
    {
        $email= new Email();
        $email->from($this->emailFrom)
            ->to($this->adminEmail)
            ->subject('New product created')
            ->text("Name: {$product->getName()} \n Price: {$product->getPrice()}");

        $this->mailer->send($email);
    }
}