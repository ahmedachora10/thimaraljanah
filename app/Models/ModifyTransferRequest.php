<?php

namespace App\Models;

use App\Traits\HasThumbnail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModifyTransferRequest extends Model
{
    use HasFactory, HasThumbnail;

    protected $guarded = [];
}