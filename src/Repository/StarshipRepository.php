<?php

namespace App\Repository;

use App\Model\Starship;
use App\Model\StarshipStatusEnum;
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
                StarshipStatusEnum::IN_PROGRESS 
            ),
            new Starship(
                2,
                'Executor',
                'Super Star Destroyer',
                'Darth Vader',
                StarshipStatusEnum::COMPLETED  
            ),
            new Starship(
                3,
                'Ghost',
                'Modified VCX-100',
                'Hera Syndulla',
                StarshipStatusEnum::WAITING  
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