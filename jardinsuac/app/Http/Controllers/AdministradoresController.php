<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\PasswordValidationRules;
use App\Exceptions\EliminarInvalidoException;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AdministradoresController extends Controller
{

    use PasswordValidationRules;

    const n_acesso = "n_acesso";
    const name = "name";
    const email = "email";
    const password = "password";
    const password_confirmation = "password_confirmation";

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        return view('admin.listar_users',
            [
                'users' => User::all(),
                'user' => Auth::user()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view('admin.criar_users',
            [
                'user' => Auth::user(),
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Response|Redirector
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        try {
            $this->validate(request(), [
                    self::name => ['required', 'string', 'max:255'],
                    self::email => ['required', 'string', 'email', 'max:255', 'unique:users'],
                    self::password => $this->passwordRules(),
                ]
            );

            $u = new User();

            $u->createUser(request(self::name), request(self::email), request(self::password));
            return redirect("admin/administradores")->withErrors(["userCriado" => "User criado com sucesso!"]);
        } catch (\Dotenv\Exception\ValidationException $e) {
            return redirect("admin/administradores/create")->withInput()->withErrors(["userCreateError" => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View|Response
     */
    public function show($id)
    {
        return view('admin.perfil_administrador',
            [
                'user' => Auth::user(),
                'administrador' => User::where('id', $id)->first(),
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function edit($id)
    {
        $u = new User();
        if(User::where('id', $id)->first()->admin_master != request(self::n_acesso))
            $u->alterarNivel($id, request(self::n_acesso));


        return redirect("admin/administradores/{$id}");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function destroy($id)
    {
        try {
        (new User)->apagarUser($id);
        return redirect("admin/administradores");
        } catch (EliminarInvalidoException $e) {
            return redirect("admin/administradores")->withErrors(["adminError" => $e->getMessage()]);
        }
    }
}
