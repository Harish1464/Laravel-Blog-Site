<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = ['site_title', 'site_logo', 'office_address', 'office_contact', 'facebook_link', 'twitter_link', 'linkedin_link', 'dribble_link', 'github_link' ];
}
