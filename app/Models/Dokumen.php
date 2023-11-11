<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Dokumen extends Model
{
    use HasFactory;
    protected $table = "dokumen";
    protected $fillable = ["id", "type", "menu", "title", "files", "type_upload"];

    public function files()
    {
        if ($this->type_upload == 1) {
            return $this->files ? asset('files/' . $this->files) : asset('files/default.png');
        }
        return $this->files;
    }
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = Str::uuid()->toString();
            }
        });
    }


    public function getIncrementing()
    {
        return false;
    }


    public function getKeyType()
    {
        return 'string';
    }
}
