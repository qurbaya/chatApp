<?php

declare(strict_types=1);

namespace Tests\Unit\Modules\Auth;

use Modules\Modules\Auth\Query\AuthQuery;
use Modules\Modules\Auth\Query\AuthQueryHandler;
use Modules\Modules\Auth\Repository\AuthRepository;
use Modules\Modules\Auth\Services\OAuthService;
use PHPUnit\Framework\MockObject\MockObject;
use Tests\TestCase;

class AuthQueryHandlerTest extends TestCase
{


    /**
     * @throws \Exception
     */
    public function testHandleWithValidCredentials(): void
    {
        $repository = $this->mockAuthRepo();
        $repository->method('find')->willReturn(true);
        $repository->method('passportClient')->willReturn((object) ['id' => 1, 'secret' => 'client_secret']);

        $authService = $this->getMockBuilder(OAuthService::class)
            ->disableOriginalConstructor()
            ->getMock();

        $authService->method('oauth')->willReturn(['access_token' => 'token', 'expires_in' => 3600]);

        $handler = new AuthQueryHandler($repository,$authService);

        $query = new AuthQuery('+7701111111','123');

        $result = $handler->handle($query);

        $this->assertArrayHasKey('access_token', $result);
        $this->assertArrayHasKey('expires_in', $result);
    }

    public function testHandleWithInValidCredentials(): void
    {
        $repository = $this->mockAuthRepo();
        $repository->method('find')->willReturn(false);

        $authService = $this->getMockBuilder(OAuthService::class)
            ->disableOriginalConstructor()
            ->getMock();

        $handler = new AuthQueryHandler($repository, $authService);

        $query = new AuthQuery('+7701111111','1123');

        $this->expectException(\DomainException::class);

        $handler->handle($query);
    }

    private function mockAuthRepo()
    {
        return $this->getMockBuilder(AuthRepository::class)
            ->disableOriginalConstructor()
            ->getMock();
    }
}
