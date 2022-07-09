<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemberTypeLookup extends Model
{
  /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'member_type_LKP';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'MEMBER_TYPE_ID';

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
      'MEMBER_TYPE'

    ];
}
