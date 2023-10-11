<?php

namespace App\Models\Menu;

use App\Models\ReferenceAbstract;

class DokumenMenu extends ReferenceAbstract
{
    protected static $lists = [
        'spmi' => 'SPMI',
        'pedoman' => 'Pedoman',
        'paduan' => 'Paduan',
        'peraturan' => 'Peraturan',
        'rip-renstra-renop' => 'RIP Renstra Renop',
        'instruksi-kerja' => 'Instruksi Kerja',
        'iku-ikt' => 'IKU & IKT',
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
