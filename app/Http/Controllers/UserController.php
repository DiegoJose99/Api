<?php
// use App\Models\user_model;
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\models\UserModel;

class UserController
{
    public function register(Request $request)
    {
        // Validar los datos del formulario de registro

        // Crear una nueva instancia del modelo
        $user = new UserModel();

        // Asignar los valores a las propiedades
        $user->inner_id = $request->input('inner_id');
        $user->direction_ip = $request->input('direction_ip');
        $user->puerto = $request->input('puerto');

        // Guardar el registro en la base de datos
        $user->save();

        // Redireccionar a la página de inicio de sesión u otra página adecuada
    }

    public function getById($id)
    {
        $user = UserModel::find($id);
        if($user){
            return response()->json(['data' => $user, 'message' => 'Registro encontrado']);
        } else {
            return response()->json(['error'=>'Registro inexistente'], 404);
        }
    }

    public function updateUser(Request $request, $id)
    {
        $user = UserModel::find($id);

        if($user){
            $user->inner_id = $request->input('inner_id');
            $user->direction_ip = $request->input('direction_ip');
            $user->puerto = $request->input('puerto');

            $user->save();

            return response()->json(['data'=>$user, 'message:'=>'Registro actualizado']);
        } else {
            return response()->json(['error:'=>'Actualizacion incorrecta'], 404);
        }
    }

}
