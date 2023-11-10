<?php

namespace App\Http\Controllers;

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
        $user = [
            'name' => 'Oleg',
            'surname' => 'Sharginov',
            'email' => 'regazzhez@yandex.ru',
            'birthdate' => '2003-04-15',
            'position' => 'student',
            'password' => 'oleg20031',
        ];
        User::create($user);

        return 'Oleg was created';
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
