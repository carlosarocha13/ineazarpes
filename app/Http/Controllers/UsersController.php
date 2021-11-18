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
            'nombres' => 'required', 'string', 'max:255',
            'apellidos' => 'required', 'string', 'max:255',
            'tipo_documento' => 'required', 'string', 'max:20',
            'numero_identificacion' => 'required', 'string', 'max:20',
            'telefono' => 'required', 'string', 'max:20',
            'direccion' => 'required|string|max:20',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:9',
            'password_confirm' => 'required|same:password'
        ]);
        $user= new User();
        $user->nombres= $request->nombres;
        $user->apellidos= $request->apellidos;
        $user->tipo_documento= $request->tipo_documento;
        $user->numero_identificacion= $request->numero_identificacion;
        $user->direccion= $request->direccion;
        $user->telefono= $request->telefono;
        $user->email= $request->email;
        $user->password=bcrypt($request->input('password'));
        $user->email_verified_at= now();
        $user->save();

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
