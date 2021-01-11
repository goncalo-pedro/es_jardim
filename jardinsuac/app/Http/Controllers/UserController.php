<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\PasswordValidationRules;
use App\Exceptions\EliminarInvalidoException;
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

    use PasswordValidationRules;

    const email = 'u_email';
    const name = 'u_name';
    const c_password = 'current_password';
    const n_password = 'password';

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

            if (! Hash::check(request(self::c_password), Auth::user()->password)) {
                return redirect('admin/perfil')->withInput()->withErrors(['password' => 'A password atual inválida.']);
            }

            Auth::user()->setPassword(request(self::n_password));
            return redirect('admin/perfil')->withInput()->withErrors(['alteracaoConcluida' => 'A password foi alterada com sucesso']);
        } catch (ValidationException $e) {
            return redirect('admin/perfil')->withInput()->withErrors(['passwordIncorreta' => $e->getMessage()]);
        }

    }


    /**
     * @param Request $request
     * @throws \Illuminate\Validation\ValidationException
     */
    public function alterarDados(Request $request, User $user) {
        try {
            $this->validate(request(), [
                    request('name') => ['required', 'string', 'max:255'],
                    request('email') => ['required', 'email', 'max:255', Rule::unique('users')->ignore(Auth::user()->id)],
                    request('photo') => ['nullable', 'image', 'max:1024'],
                ]
            );

            if (request(self::email) != Auth::user()->getEmail()) {
                if(Auth::user())
                    Auth::user()->updateEmail(request(self::email));
            } else {
                Auth::user()->updateName(request(self::name));
            }
            return redirect('admin/perfil')->withInput()->withErrors(['alteracaoConcluida' => 'Os dados foram alterados com sucesso']);
        } catch (ValidationException $e) {
            return redirect('admin/perfil')->withInput()->withErrors(['dadosIncorretos' => $e->getMessage()]);
        } catch (EliminarInvalidoException $e) {
            return redirect('admin/perfil')->withInput()->withErrors(['emailExistente' => $e->getMessage()]);
        }
    }
}
