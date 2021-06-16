<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Glossary extends Model
{

    protected $table = 'glossary';

    protected $fillable = ['text'];
}
