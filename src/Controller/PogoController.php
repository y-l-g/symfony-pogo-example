<?php

namespace App\Controller;

use App\Message\TestJob;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Attribute\Route;

class PogoController extends AbstractController
{
    #[Route('/test-dispatch', name: 'test_dispatch')]
    public function index(MessageBusInterface $bus): Response
    {
        $bus->dispatch(new TestJob('Hello Pogo from browser ! ' . date('H:i:s')));

        return new Response('Job sent, check logs !');
    }
}