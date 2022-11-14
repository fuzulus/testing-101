<?php

declare(strict_types=1);

namespace App\Tests\Functional;

use GuzzleHttp\Psr7\Request;

/**
 * @coversNothing
 *
 * @small
 */
interface EndpointTestCase
{
    public const GET = 'GET';
    public const POST = 'POST';
    public const PUT = 'PUT';
    public const PATCH = 'PATCH';
    public const DELETE = 'DELETE';
    public const HEAD = 'HEAD';
    public const CONNECT = 'CONNECT';
    public const OPTIONS = 'OPTIONS';
    public const TRACE = 'TRACE';

    public function validateEndpoint(Request $request, string $path, int $expectedStatusCode): void;
}