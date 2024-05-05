<?php

namespace Structure\Project\Traits;

trait HasTypes
{
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
