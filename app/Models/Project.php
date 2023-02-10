<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    private $name;
    private $description;
    private $main_image;
    private $release_date;
    private $repo_link;
}
