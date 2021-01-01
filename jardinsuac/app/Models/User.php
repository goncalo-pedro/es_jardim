<?php

namespace App\Models;

use App\Exceptions\EmailException;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'admin_master'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function getAdminMaster()
    {
        return $this->admin_master;
    }

    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param $email
     * @throws EmailException
     */
    public function updateEmail($email)
    {
        $u_email = User::where('email', $email)->first();
        if($u_email != null)
            throw new EmailException("Email já existente.");
        $this->email = $email;
        $this->save();
    }

    public function updateName ($name)
    {
        $this->name = $name;
        $this->save();
    }

    public function setPassword($password)
    {
        $this->password = Hash::make($password);
        $this->save();
    }
}
