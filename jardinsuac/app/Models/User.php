<?php

namespace App\Models;

use App\Exceptions\EliminarInvalidoException;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
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
     * @throws EliminarInvalidoException
     */
    public function updateEmail($email)
    {
        $u_email = User::where('email', $email)->first();
        if($u_email != null)
            throw new EliminarInvalidoException("Email já existente.");
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

    public function alterarNivel ($id, $nivel)
    {
        $u = User::where('id', $id)->first();
        $u->admin_master = $nivel;

        $u->save();
    }

    public function createUser($name, $email, $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = Hash::make($password);
        $this->admin_master = 0;

        $this->save();
    }

    /**
     * @param $id
     * @throws EliminarInvalidoException
     */
    public function apagarUser($id)
    {
        $adminsAN = DB::table('users')->where("admin_master", 1)->count();
        if($adminsAN == 1)
            throw new EliminarInvalidoException("Erro ao eliminar utilizador de alto nível.");
        $u = $this->where("id", $id);
        foreach(DB::table("sessions")->where("user_id", $id)->get() as $session) {
            $session->delete();
        };
        $u->delete();

    }
}
