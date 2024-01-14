<?php

namespace app\enums;

enum OrderStatus: string
{
    case RESOLVED = 'resolved';
    case NEW = 'new';
    case IN_PROGRESS = 'in_progress';
}
