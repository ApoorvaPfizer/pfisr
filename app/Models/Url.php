<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Url extends Model
{
    use HasFactory;
    protected $fillable = [
        'url',
        'optional_alias',
        'exipration_date',
        'link_redirection',
        'group_name',
        'brand',
        'short-url',
        'user',
        'count'       
      ];
}