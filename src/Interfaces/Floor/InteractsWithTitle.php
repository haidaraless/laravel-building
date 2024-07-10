<?php

namespace Structure\Project\Interfaces\Floor;

interface InteractsWithTitle
{
    public function isGroundFloor(): bool;
    public function isFirstFloor(): bool;
    public function isRoofDeck(): bool;
}
