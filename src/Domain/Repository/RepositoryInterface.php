<?php

declare(strict_types = 1);

namespace PHPDDDStarter\Repository;

use PHPDDDStarter\Domain\Entity\EntityInterface;

interface RepositoryInterface
{
    /**
     * @param EntityInterface $entity
     */
    public function add(EntityInterface $entity);

    /**
     * @param EntityInterface $entity
     */
    public function remove(EntityInterface $entity);
}