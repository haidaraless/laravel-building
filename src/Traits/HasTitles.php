<?php

namespace Structure\Project\Traits;

trait HasTitles
{
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
