<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $fillable = ['member_name', 'designation', 'image', 'description', 'google_link', 'twitter_link', 'facebook_link', 'linkedin_link'];
}
