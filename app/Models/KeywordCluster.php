<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KeywordCluster extends Model
{
    protected $fillable = ['name','description'];

    public function keywords()
    {
        return $this->hasMany(Keyword::class);
    }
}
