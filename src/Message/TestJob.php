<?php

namespace App\Message;

class TestJob
{
    public function __construct(
        public string $content
    ) {
    }
}