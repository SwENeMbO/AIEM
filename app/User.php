<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    const ADMIN_TYPE = 'Admin';
	const USER_TYPE = 'User';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function role()
	{
		return $this->hasOne('App\Role');
    }

    public function transaction()
	{
		return $this->hasMany('App\Transaction');
    }

    /* Retorna true si el usuario en cuestión es tipo admin.*/
	public function isAdmin()
	{
		return $this->roleId === self::ADMIN_TYPE;
	}

	/* Retorna true si el usuario en cuestión es tipo customer.*/
	public function isUser()
	{
		return $this->roleId === self::USER_TYPE;    
	}

	/* Retorna la id del usuario en cuestión.*/
	public function getId()
	{
	  return $this->id;
	}

	/* Retorna el tipo del usuario en cuestión.*/
	public function getRoleId()
	{
		return $this->roleId;
    }
}
