<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
class UsersController extends Controller
{
    public function index()
    {
        $users= User::all();
        return view('users.index', compact("users"));
        
    }

    public function create(){
        $roles=Role::all()->pluck('name','id');
        return view('users.create', compact('roles'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'password_confirm' => 'required|same:password' 

        ]);

        $user= User::create($request->only('name','email')
         +[
             'password'=>bcrypt($request->input('password')),
        ]);
        
        $roles=$request->input('roles', []);
        $user->roles()->sync($roles);

         return redirect()->route('users', $user->id)->with('success','Usuario creado con exito.');
    }

    public function show($id){
        $user=User::find($id);
        $user->load('roles');
        return view('users.show',compact('user'));
    }

    public function edit(User $user){
        $roles=Role::all()->pluck('name','id');
        $user->load('roles');
        
        return view('users.edit',compact('user','roles'));
    }

    public function update(Request $request,user $user){
        $data=$request->only('name','email');
        $password=$request->input('password');
        $passwordconfirm=$request->input('password_confirm');
        if($password!="" && $passwordconfirm!="" && $password==$passwordconfirm){
            $data['password']=bcrypt($password);
            
        }

        $user->update($data);
         
        $roles=$request->input('roles',[]);
        $user->roles()->sync($roles);
        return redirect()->route('users')->with('success','Usuario modificado con exito.');
    }

    public function destroy(User $user){
        if (auth()->user()->id == $user->id) {
            return redirect()->route('users')->with('danger','Acción no permitida, no puede eliminar su propio usuario.');
        }
        $user->delete();
        return back()->with('success','Usuario eliminado con exito.');
    }
   
}
