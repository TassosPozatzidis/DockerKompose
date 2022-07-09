<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
  /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'members';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'MEMBER_ID';

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
        'FIRST_NAME',
        'FATH_NAME',
        'LAST_NAME',
        'EMAIL',
        'DATE_OF_BIRTH',
        'WEB_PAGE',
        'MEMBER_SHORT_CV',
        'MEMBER_TYPE_ID'
    ];
}
