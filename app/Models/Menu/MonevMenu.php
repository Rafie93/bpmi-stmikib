<?php

namespace App\Models\Menu;

use App\Models\ReferenceAbstract;

class MonevMenu extends ReferenceAbstract
{
    protected static $lists = [
        'monev-institusi' => 'Monev Institusi',
        'monev-prodi-si' => 'Monev Prodi SI',
        'monev-prodi-ti' => 'Monev Prodi TI',
        'monev-prodi-mi' => 'Monev Prodi MI',
        'monev-prodi-ka' => 'Monev Prodi KA',
        'pedoman-ami' => 'Pedoman AMI',
        'audit-mutu' => 'Audit Mutu',
        'rapat-tinjauan-manajemen' => 'Rapat Tinjauan Manajemen',
        'instrumen-monev' => 'Instrumen Monev',
        'laporan-kinerja' => 'Laporan Kinerja',
        'daftar-auditor' => 'Daftar Auditor',
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
