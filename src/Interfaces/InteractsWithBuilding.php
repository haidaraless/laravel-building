<?php

namespace Structure\Project\Interfaces;

use Illuminate\Database\Eloquent\Relations\HasOne;

interface InteractsWithBuilding
{
    public function building(): HasOne;
}
