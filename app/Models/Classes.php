<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
  /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'classes';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'CLASS_ID';

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
      'CLASS_NAME',
      'DEPARTMENT',
      'TRAINING_CYCLE',
      'SEMESTER'
    ];
}
