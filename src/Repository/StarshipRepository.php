<?php

namespace App\Repository;

use App\Model\Starship;
use Psr\Log\LoggerInterface;

class StarshipRepository
{
    public function __construct(private LoggerInterface $logger)
    {
    }

    public function findAll(): array
    {
        $this->logger->info('Collection de vaisseaux récupérée');

        return [
            new Starship(
                1,
                'Millennium Falcon',
                'Light Freighter',
                'Han Solo',
                'Operational',
            ),
            new Starship(
                2,
                'Executor',
                'Super Star Destroyer',
                'Darth Vader',
                'Destroyed',
            ),
            new Starship(
                3,
                'Ghost',
                'Modified VCX-100',
                'Hera Syndulla',
                'Operational',
            ),
        ];
    }

    public function find(int $id): ?Starship
    {
        foreach ($this->findAll() as $starship) {
            if ($starship->getId() === $id) {
                return $starship;
            }
        }

        return null;
    }
}
