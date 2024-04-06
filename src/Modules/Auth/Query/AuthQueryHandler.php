<?php

declare(strict_types=1);

namespace Modules\Modules\Auth\Query;

use Modules\Modules\Auth\Repository\AuthRepository;
use Modules\Modules\Auth\Services\OAuthService;

final readonly class AuthQueryHandler
{
    public function __construct(
        private AuthRepository $repository,
        private OAuthService   $authService
    )
    {
    }

    /**
     * @throws \Exception
     */
    public function handle(AuthQuery $query): array
    {
        if (!$this->repository->find($query->getEmail(), $query->getPassword())) {
            throw new \DomainException('Email or password incorrect');
        }

        $client = $this->repository->passportClient();

        return $this->authService->oauth(
            $query->getEmail(),
            $query->getPassword(),
            $client->id,
            $client->secret
        );
    }


}
