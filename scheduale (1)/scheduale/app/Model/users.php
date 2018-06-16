<?php
/**
 * Created by PhpStorm.
 * User: 7oor
 * Date: 5/29/2018
 * Time: 2:30 AM
 */

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
class users extends Model
{
    protected $table = 'users';
    protected $fillable = [
        'username', 'email', 'password','mobile','type','user_type_id'
    ];

}