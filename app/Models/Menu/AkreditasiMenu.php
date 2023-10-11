<?php

namespace App\Models\Menu;

use App\Models\ReferenceAbstract;

class AkreditasiMenu extends ReferenceAbstract
{
    protected static $lists = [
        'institusi' => 'Institusi',
        'prodi-si' => 'Prodi SI',
        'prodi-ti' => 'Prodi TI',
        'prodi-mi' => 'Prodi MI',
        'prodi-ka' => 'Prodi KA',
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
