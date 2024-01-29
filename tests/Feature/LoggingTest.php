<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class LoggingTest extends TestCase
{
    public function testLog()
    {
        Log::info("Hello Info");
        Log::warning("Hello Warning");
        Log::error("Hello Error");
        Log::critical("Hello Critical");

        $this->assertTrue(true);
    }

    public function testContext()
    {
        Log::info("Hello Info", ["user" => "rahmat"]);
        Log::warning("Hello Warning", ["user" => "rahmat"]);
        Log::error("Hello Error", ["user" => "rahmat"]);
        Log::critical("Hello Critical", ["user" => "rahmat"]);

        $this->assertTrue(true);
    }

    public function testWithContext()
    {
        Log::withContext(["user" => "Rahmat"]);

        Log::info("Hello Info");
        Log::warning("Hello Warning");
        Log::error("Hello Error");
        Log::critical("Hello Critical");

        $this->assertTrue(true);
    }

    public function testWithChannel()
    {
        $slackLogger = Log::channel('slack');
        $slackLogger->error("Hello Slack ^0^"); // will send directly to slack channel

        Log::info("Hello Laravel"); // log will send to default channel

        $this->assertTrue(true);
    }

    public function testFileHandler(){
        $fileLogger = Log::channel('file');
        $fileLogger->info("Hello Info");
        $fileLogger->warning("Hello Warning");
        $fileLogger->error("Hello Error");
        $fileLogger->critical("Hello Critical");

        $this->assertTrue(true);
    }
}
