<?php

namespace App\Http\Controllers;

use App\Models\User;
use Dotenv\Exception\ValidationException;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Rules\Password;

class UserController extends Controller
{
    const user = 'user';
    const email = 'u_email';
    const name = 'u_name';
    const c_password = 'c_password';
    const n_password = 'n_password';
    const vn_password = 'vn_password';


    public function index () {
        return view('admin.listar_users',
            [
                'users' => User::all(),
                'user' => Auth::user()
            ]
        );

    }

    public function perfil() {
        return view ('admin.perfil_user',
            [
                'user' => Auth::user(),
            ]
        );
    }

    /**
     * @param Request $request
     * @throws \Illuminate\Validation\ValidationException
     */
    public function alterarPass(Request $request) {
        try {
            $this->validate(request(), [
                    self::c_password => ['required', 'string'],
                    self::n_password => $this->passwordRules(),
                ]
            );

            if (! Hash::check(request(self::n_password), request(self::user)->password)) {
                return redirect('admin/perfil')->withInput()->withErrors(['password' => 'A password atual não é válida.']);
            }

            request(self::user)->setPassword(request(self::n_password));
            return redirect('admin/perfil')->withInput()->withErrors(['alteracaoConcluida' => 'A password foi alterada com sucesso']);
        } catch (ValidationException $e) {
            return redirect('admin/perfil')->withInput()->withErrors(['passwordIncorreta' => $e->getMessage()]);
        }

    }

    protected function passwordRules()
    {
        return ['required', 'string', new Password, 'confirmed'];
    }

    /**
     * @param Request $request
     * @throws \Illuminate\Validation\ValidationException
     */
    public function alterarDados(Request $request) {
        dd(request(self::email));
        /*
        try {
            $this->validate(request(), [
                    'name' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore(request(self::user)->id)],
                    'photo' => ['nullable', 'image', 'max:1024'],
                ]
            );

            if ($request['email'] !== request(self::user)->getEmail()) {
                request(self::user)->updateEmail(request(self::email));
            } else {
                request(self::user)->updateName(request(self::name));
            }
            return redirect('admin/perfil')->withInput()->withErrors(['alteracaoConcluida' => 'A password foi alterada com sucesso']);
        } catch (ValidationException $e) {
            return redirect('admin/perfil')->withInput()->withErrors(['dadosIncorretos' => $e->getMessage()]);
        }*/
    }
}
