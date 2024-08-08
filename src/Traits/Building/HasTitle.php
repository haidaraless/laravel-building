<?php

namespace Structure\Project\Traits\Building;

trait HasTitle
{
    public function getTitle(): string
    {
        return $this->title->title;
    }
}
