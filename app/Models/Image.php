<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Gallery;
use App\Models\User;

class Image extends Model
{
    use HasFactory;

    public function gallery() {
        return $this->belongsTo(Gallery::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function addImages($source, $id) {
        return images()->create([
            'source' => $source,
            'gallery_id' => $id
        ]);
    }
}
