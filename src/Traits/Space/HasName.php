<?php

namespace Structure\Project\Traits\Space;

trait HasName
{
    public function getName(): string
    {
        return $this->title->name;
    }
}
