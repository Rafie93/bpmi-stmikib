<?php

namespace App\Models\Menu;

use App\Models\ReferenceAbstract;

class AplikasiMenu extends ReferenceAbstract
{
    protected static $lists = [
        'http://stmik.id/' => 'STMIK Indonesia Banjarmasin',
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
