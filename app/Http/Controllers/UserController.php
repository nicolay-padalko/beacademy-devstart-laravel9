<?php

namespace App\Http\Controllers;

use App\Exceptions\UserControllerException;
use App\Models\User;
use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateUseFormRequest;


class UserController extends Controller
{

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function index(Request $request)
    {

        $users = $this->model->getUsers(
            $request->search ?? ''
        );

        return view('users.index', compact('users'));


    }

    public function show($id)
    {
//        if (!$user = User::find($id))
//            return redirect()->route('users.index');



        $user = User::find($id);


//        $team = Team::find($id);
//        $team->load('users');
//        return $team;

        $title = 'Usuário ' . $user->name;

        if($user) {
            return view('users.show', compact('user', 'title'));
        } else {
            throw new UserControllerException('User não encontrado');
        }

//        $user->load('teams');
//        return $user;
        return view('users.show', compact('user', 'title'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(StoreUpdateUseFormRequest $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($request->password);

        if ($request->image) {
            $file = $request['image'];
            $path = $file->store('storage', 'public');
            $data['image'] = $path;
        }

        $this->model->create($data);

//        return redirect()->route('users.index');

        $request->session()->flash('create', 'Usuário cadastrado com sucesso!');
        return redirect()->route('users.index')->with('create', 'Usúario cadastrado com sucesso');
    }

    public function edit($id)
    {
        if (!$user = $this->model->find($id))
            return redirect()->route('users.index');
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        if (!$user = $this->model->find($id))
            return redirect()->route('users.index');

        $data = $request->only('name', 'email');
        if ($request->password)
            $data['password'] = bcrypt($request->password);

        $data['is_admin'] = $request->admin?1:0;

        $user->update($data);
//        return redirect()->route('users.index');
//        request->session()->flash('create', 'Usuário cadastrado com sucesso!');
        return redirect()->route('users.index')->with('edit', 'Usúario atualizado com sucesso');
    }


    public function destroy($id)
    {
        if (!$user = $this->model->find($id))
            return redirect()->route('users.index');

        $user->delete();

//        return redirect()->route('users.index');
        return redirect()->route('users.index')->with('delete', 'Usúario excluido com sucesso');
    }

    public function admin()
    {
        return view('admin.index');
    }

}
