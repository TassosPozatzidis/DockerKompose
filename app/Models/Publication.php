<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
  /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'publications';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'PUBLICATION_ID';

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
      'PUBLICATION_CATEGORY_ID',
      'PUBLICATION_NAME',
      'PUBLICATION_MEDIA',
      'PUBLICATION_SUBJECT'
    ];
}
