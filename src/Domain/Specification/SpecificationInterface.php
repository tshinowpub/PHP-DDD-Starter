<?php

declare(strict_types = 1);

namespace PHPDDDStarter\Specification;

use PHPDDDStarter\Domain\Entity\EntityInterface;

interface SpecificationInterface
{
    /**
     * @param EntityInterface $entity
     *
     * @return bool
     */
    public function isSatisfiedBy(EntityInterface $entity): bool;
}