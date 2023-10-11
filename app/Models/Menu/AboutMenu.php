<?php

namespace App\Models\Menu;

use App\Models\ReferenceAbstract;

class AboutMenu extends ReferenceAbstract
{
    protected static $lists = [
        'sejarah' => 'Sejarah',
        'visi-misi' => 'Visi & Misi',
        'tujuan' => 'Tujuan',
        'nilai-dasar' => 'Nilai Dasar dan Logo',
        'program-kerja-lpm' => 'Program Kerja LPM',
        'program-kerja-upm' => 'Program Kerja UPM',
        'statuta' => 'Statuta',
        'struktur' => 'Struktur Organisasi',
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
