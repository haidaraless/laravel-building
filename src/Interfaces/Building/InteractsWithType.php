<?php

namespace Structure\Project\Interfaces\Building;

interface InteractsWithType
{
    public function getTypeName(): string;

    public function getTypeSlug(): string;

    public function isResidential(): bool;

    public function isCommercial(): bool;

    public function isManagerial(): bool;

    public function isResidentialCommercial(): bool;

    public function isCommercialManagerial(): bool;
}
