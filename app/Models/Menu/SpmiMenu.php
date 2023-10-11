<?php

namespace App\Models\Menu;

use App\Models\ReferenceAbstract;

class SpmiMenu extends ReferenceAbstract
{
    protected static $lists = [
        'kebijakan-spmi' => 'Kebijakan SPMI',
        'manual-spmi' => 'Manual SPMI',
        'manual-prosedur' => 'Manual Prosedur',
        'standar-spmi' => 'Standar SPMI',
        'prosedur-operasional-standar' => 'Prosedur Operasional Standar',
        'formulir-spmi' => 'Formulir SPMI',
    ];

    public static function all()
    {
        return collect(static::toArray());
    }

    public static function getById($singleId)
    {
        if ($singleId && isset(static::$lists[$singleId])) {
            return static::$lists[$singleId];
        }
        return null;
    }
}
