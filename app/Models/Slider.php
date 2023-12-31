<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $table = "slider";
    protected $fillable = ["title", "image", "description", "status"];

    public function image()
    {
        return $this->image ? asset('image/slide/' . $this->image) : asset('uploads/default.png');
    }
}
