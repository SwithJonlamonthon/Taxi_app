<?php

namespace App\Models\Payment;

use Carbon\Carbon;
use App\Models\User;
use App\Base\Uuid\UuidModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo;

class UserBankInfo extends Model
{
    use UuidModel;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users_bank_info';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'account_name', 'account_no', 'bank_code','bank_name'
    ];

    /**
     * The relationships that can be loaded with query string filtering includes.
     *
     * @var array
     */
    public $includes = [

    ];

    /**
    * The accessors to append to the model's array form.
    *
    * @var array
    */
    protected $appends = [

    ];

    /**
    * The user wallet that the user_id belongs to.
    * @tested
    *
    * @return belongsTo
    */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
    * Get formated and converted timezone of user's created at.
    *
    * @param string $value
    * @return string
    */
    public function getConvertedCreatedAtAttribute()
    {
        if ($this->created_at==null||!auth()->user()->exists()) {
            return null;
        }
        $timezone = auth()->user()->timezone?:env('SYSTEM_DEFAULT_TIMEZONE');
        return Carbon::parse($this->created_at)->setTimezone($timezone)->format('jS M h:i A');
    }
    /**
    * Get formated and converted timezone of user's created at.
    *
    * @param string $value
    * @return string
    */
    public function getConvertedUpdatedAtAttribute()
    {
        if ($this->updated_at==null||!auth()->user()->exists()) {
            return null;
        }
        $timezone = auth()->user()->timezone?:env('SYSTEM_DEFAULT_TIMEZONE');
        return Carbon::parse($this->updated_at)->setTimezone($timezone)->format('jS M h:i A');
    }
}
