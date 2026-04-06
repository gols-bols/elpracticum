<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PracticeReport extends Model
{
    protected $fillable = ['student_name','group','supervisor','organization','period','tasks','conclusion','file_path'];
}
