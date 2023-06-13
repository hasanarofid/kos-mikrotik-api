<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

   public static function custom_echo($x, $length)
    {
      if(strlen($x)<=$length)
      {
        echo $x;
      }
      else
      {
        $y=substr($x,0,$length) . '...';
        echo $y;
      }
    }

    public static function formatBytes($size, $decimals = 0){
      $unit = array(
      '0' => 'Byte',
      '1' => 'KiB',
      '2' => 'MiB',
      '3' => 'GiB',
      '4' => 'TiB',
      '5' => 'PiB',
      '6' => 'EiB',
      '7' => 'ZiB',
      '8' => 'YiB'
      );
      
      for($i = 0; $size >= 1024 && $i <= count($unit); $i++){
      $size = $size/1024;
      }
      
      return round($size, $decimals).' '.$unit[$i];
      }
}
