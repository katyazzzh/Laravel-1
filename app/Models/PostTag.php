<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperPostTag
 */
class PostTag extends Model
{
    use HasFactory;
    protected $guarded = false;
}
