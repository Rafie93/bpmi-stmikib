<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class News extends Model
{
    use HasFactory;
    protected $table = "news";
    protected $fillable = ["title", "category", "image", "description", "status", "be_read"];

    public function image()
    {
        return $this->image ? asset('image/news/' . $this->image) : asset('uploads/default.png');
    }

    public function count()
    {
        return News::where('category', $this->category)->count();
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
