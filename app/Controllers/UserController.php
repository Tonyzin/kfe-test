<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\UserModel;
use App\Validators\UserCreateValidator;
use App\Validators\UserUpdateValidator;
use CoffeeCode\Router\Router;

class UserController extends Controller
{
    
    /**
     * @return void
     */
    public function index() : void
    {
        $user = new UserModel();
        $this->view("home", ['users' => $user->getAll()]);
    }

    /**
     * @return void
     */
    public function show($data) : void
    {
        $id = $data['id'];
        $user = (new UserModel())->get("id = $id");
        $this->view("update", ['user' => $user[0]]);
    }

    /**
     * @return void
     */
    public function create() : void
    {
        $this->view('create');
    }

    public function store()
    {
        $validator = new UserCreateValidator((object) $_POST);

        if(!empty($validator->errors)){
            $this->json(["success" => false, "message" => "Campo(s) invalido(s)", "data" => array_keys($validator->errors)]);
        }

        $user = (new UserModel());
        $user->create($_POST);

        return $this->json(['success' => true, "message" => "Conta criada com sucesso!"]);
    }  

    /**
     * @return Router
     */
    public function update()
    {
        $validator = new UserUpdateValidator((object) $_POST);

        if(!empty($validator->errors)){
            $this->json(["success" => false, "message" => "Campo(s) invalido(s)", "data" => array_keys($validator->errors)]);
        }

        $user = (new UserModel());
        $user->update($_POST);

        return $this->json(["success" => true, "message" => "Conta atualizada com sucesso xara!"]);
    }

     /**
     * @return Router
     */
    public function destroy()
    {
        $id = (int) $_POST['id'];
        $user = (new UserModel());

        if(!isset($id) || !$user->delete($id)){
            return $this->json([
                "success" => false,
                "message" => "Não foi possivel excluir esse usuario!"
            ]);
        }


        return $this->json([
            "success" => true,
            "message" => "Usuario excluido com sucesso!"
        ]);
    }


}
