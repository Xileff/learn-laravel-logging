<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class LoggingTest extends TestCase
{
    public function testLogging()
    {
        Log::info('Hello info');
        Log::warning('Hello warning');
        Log::error('Hello error');
        Log::critical('Hello critical');

        self::assertTrue(true);
    }

    public function testContext()
    {
        Log::info("Hello Context", ["user" => "felix"]);

        self::assertTrue(true);
    }

    public function testWithContext()
    {
        Log::withContext(["user" => "felix"]);

        Log::info("Hello Context 1");
        Log::info("Hello Context 2");
        Log::info("Hello Context 3");

        self::assertTrue(true);
    }

    public function testWithChannel()
    {
        // Selected channel
        $stdErrLogger = Log::channel('stderr');
        $stdErrLogger->info("Selected channel : stderr");

        // Default channel
        Log::info("Default channels : single, slack, stderr");

        self::assertTrue(true);
    }
}
