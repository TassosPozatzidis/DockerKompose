<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
  /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'announcements';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'ANNOUNCEMENT_ID';

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
      'USER_ID',
      'ANNOUNCEMENT_DESCRIPTION'
    ];
}
