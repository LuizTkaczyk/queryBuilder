<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        // $users = DB::table('users')
        // ->select('users.id','users.name', 'users.status')
        // ->where('users.status', '=', '1')
        // ->orderBy('name', 'ASC')
        // ->limit(20)
        // ->offset(1)
        // ->get();

        // foreach ($users as $user) {
        //     echo "<p>#{$user->id} - Nome:{$user->name} - {$user->status}</p>";
        // }

        //metodos raw (força bruta)
        // $users = DB::table('users')
        //                 ->selectRaw("users.id, users.name, CASE WHEN users.status = 1 THEN 'ATIVO' ELSE 'INATIVO' END status_description")
        //                 ->whereRaw("(SELECT COUNT(1) FROM addresses a WHERE a.user = users.id) > 2") //"a" é somente um alias
        //                 ->whereRaw('users.status = 1')
        //                 ->get();

        // foreach ($users as $user) {
        //     echo "<p>#{$user->id} - Nome:{$user->name} - {$user->status_description}</p>";
        // }

        // DB::table('users')->where('id', '<', 500)->chunkById(50,function($users){
        //     foreach ($users as $user) {
        //         echo "<p>#{$user->id} - Nome:{$user->name} - {$user->status}</p>";

        //     }
        // });

        // echo "<h4>Encerrou um ciclo</h4>";
        // sleep(1);

        // $users = DB::table('users')
        // ->select('users.id', 'users.name', 'users.status', 'addresses.address')
        // ->join('addresses', function($join){
        //     $join->on('users.id', '=', 'addresses.user')->where('addresses.status', '=','1');
        // })
        // ->orderBy('users.id', 'ASC')
        // ->get();

        // echo "<h2>Total de registros : {$users->count()}</h2>";
        // foreach ($users as $user) {
        //     echo "<p>#{$user->id} - <strong>Nome:</strong>{$user->name} - {$user->status} - {$user->address}</p>";
        // }
        // echo "<hr>";

        //inserindo elementos em uma tabela no banco de dados
        // DB::table('users')->insert([
        //     'name' => 'Luiz Antonio Tkaczyk dos Santos',
        //     'email' => 'luiz@luiz.com.br',
        //     'password' => bcrypt('#ç]W%@@+LuIz?'),
        //     'status' => '1'


        // ]);

        //atualizando um registro na tabela, ATENÇÃO, O UPDATE É FEITO SEMPRE COM O USO DO WHERE
        // DB::table('users')->where('id', '=', '1001')->update([
        //     'name' => 'Luiz Antonio ',

        // ]);

        //deletando um valor na tabela
        //DB::table('users')->where('id', '=', '1001')->delete();

        $users = DB::table('users')->paginate(10);

        foreach ($users as $user) {
            echo "<p>#{$user->id} - <strong>Nome:</strong>{$user->name} - {$user->status}</p>";
        }
        echo "<hr>";

        echo $users->links();
    }
}
