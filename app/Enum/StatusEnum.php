<?php
namespace App\Enum;

enum StatusEnum:string{
    case ACTIVE = 'active';
    case BLOCKED = 'blocked';
    case FINISHED = 'finished';

}
