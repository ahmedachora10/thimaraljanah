<?php

namespace App\Models;

use App\Traits\HasThumbnail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReserveDollarRequest extends Model
{
    use HasFactory, HasThumbnail;

    protected $guarded = [];
}