<?php

namespace App\MessageHandler;

use App\Message\TestJob;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class TestJobHandler
{
    public function __invoke(TestJob $message): void
    {
        file_put_contents(
            __DIR__ . '/../../var/log/pogo_test.log',
            "Message received : " . $message->content . "\n",
            FILE_APPEND
        );
    }
}