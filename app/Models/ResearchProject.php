<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResearchProject extends Model
{
  /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'research_project';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'RESEARCH_PROJECT_ID';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
      'RESEARCH_PROJECT_NAME',
      'RESEARCH_PROJECT_START_DATE',
      'RESEARCH_PROJECT_END_DATE',
      'RESEARCH_PROJECT_BACKER'

    ];
}
