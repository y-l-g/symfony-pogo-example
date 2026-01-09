<?php
namespace App\MessageHandler;

use App\Message\TestJob;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class TestJobHandler
{
    public function __construct(
        private LoggerInterface $logger
    ) {
    }

    public function __invoke(TestJob $message): void
    {
        $this->logger->info("Message received : " . $message->content);
    }
}