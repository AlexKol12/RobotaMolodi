<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectDescription extends Model
{
    protected $table = 'projects_descriptions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'desc_company',
        'about_company',
        'about_project',
        'term_project',
        'breaf_desc',
        'full_desc',
    ];

    public function project()
    {
        return $this->belongsTo('App\Models\Project', 'project_id');
    }
}
