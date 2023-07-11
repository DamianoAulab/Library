<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['path', 'announcement_id'];
    use HasFactory;

    public function announcement() {
        return $this->belongsTo(Announcement::class);
    }
}
