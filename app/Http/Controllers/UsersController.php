<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\Users;
class UsersController extends Controller {

    public function index()
    {
        return $this->respond(Response::HTTP_OK, Users::all());
    }

    public function show($id)
    {
        $user = Users::find($id);
        if(is_null($user)){
            return $this->respond(Response::HTTP_NOT_FOUND);
        }
        return $this->respond(Response::HTTP_OK, $user);
    }

    public function store(Request $request)
    {
        $this->validate($request, Users::$rules);
        return $this->respond(Response::HTTP_CREATED, Users::create($request->all(),['is_shopkeeper' => 0]));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, Users::$rules);
        $user = Users::find($id);
        if(is_null($user)){
            return $this->respond(Response::HTTP_NOT_FOUND);
        }
        $user->update($request->all());
        return $this->respond(Response::HTTP_OK, $user);
    }

    public function destroy($id)
    {
        if(is_null(Users::find($id))){
            return $this->respond(Response::HTTP_NOT_FOUND);
        }
        Users::destroy($id);
        return $this->respond(Response::HTTP_NO_CONTENT);
    }

    protected function respond($status, $data = [])
    {
        return response()->json($data, $status);
    }

}