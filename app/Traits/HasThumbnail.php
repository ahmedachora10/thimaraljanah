<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait HasThumbnail
{
    public function thumbnail($attr) {
        return $this->{$attr} != null && Storage::disk('public')->exists($this->{$attr}) ? 'storage/' .$this->{$attr} : '#';
    }
}