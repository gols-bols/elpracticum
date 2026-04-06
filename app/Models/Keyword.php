<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
    protected $fillable = ['keyword_cluster_id','term','search_volume','relevance_score'];

    public function cluster()
    {
        return $this->belongsTo(KeywordCluster::class, 'keyword_cluster_id');
    }
}
