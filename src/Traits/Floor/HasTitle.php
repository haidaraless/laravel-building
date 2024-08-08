<?php

namespace Structure\Project\Traits\Floor;

trait HasTitle
{
    public function getTitle(): string
    {
        return $this->title->title;
    }

    public function isGroundFloor(): bool
    {
        return $this->title->slug === 'ground-floor';
    }

    public function isFirstFloor(): bool
    {
        return $this->title->slug === 'first-floor';
    }

    public function isRoofDeck(): bool
    {
        return $this->title->slug === 'roof-deck';
    }
}
