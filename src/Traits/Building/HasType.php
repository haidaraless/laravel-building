<?php

namespace Structure\Project\Traits\Building;

trait HasType
{
    public function getTypeName(): string
    {
        return $this->type->name;
    }

    public function getTypeSlug(): string
    {
        return $this->type->slug;
    }

    public function isResidential(): bool
    {
        return $this->type->slug == 'residential';
    }

    public function isCommercial(): bool
    {
        return $this->type->slug == 'commercial';
    }

    public function isManagerial(): bool
    {
        return $this->type->slug == 'managerial';
    }

    public function isResidentialCommercial(): bool
    {
        return $this->type->slug == 'residential-commercial';
    }

    public function isCommercialManagerial(): bool
    {
        return $this->type->slug == 'commercial-managerial';
    }
}
