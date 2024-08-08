<?php

namespace Structure\Project\Traits\Unit;

trait HasTitle
{
    public function getTitle(): string
    {
        return $this->title->title;
    }
}
