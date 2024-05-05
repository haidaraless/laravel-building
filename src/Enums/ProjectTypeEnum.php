<?php

namespace Structure\Project\Enums;

enum ProjectTypeEnum: int
{
    case RESIDENTIAL = 1;
    case COMMERCIAL = 2;
    case MANAGERIAL = 3;
    case RESIDENTIAL_COMMERCIAL = 4;
    case COMMERCIAL_MANAGERIAL = 5;
}
