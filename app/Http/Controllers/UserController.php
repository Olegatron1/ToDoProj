<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Queue\Worker;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('user.index', compact('users'));
    }

    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(StoreRequest $request)
    {

        $data = $request->validated();

        User::create($data);

        return redirect()->route('user.index');
    }


    public function update()
    {
        $user = User::find(1);

        $user->update([
            'name' => 'Angel',
            'surname' => 'Gubashlepova'
        ]);


        return 'this is index';
    }

    public function delete()
    {
        $user = User::find(2);

        $user->delete();
    }

}
