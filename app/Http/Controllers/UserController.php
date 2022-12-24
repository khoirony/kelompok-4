<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function index(){
        // get all data table user, kategori and author using join
        $user = User::select(
            "*",
        )
        ->join("aspirasis", "aspirasis.id_user", "=", "users.id")
        ->get();
        
        // send response success json
        return response()->json([
            "status" => true,
            "message" => "data ditemukan",
            "data" => $user,
        ]);
    }

    public function show($id){
        // get book by id equal param id
        $user = User::query()->where("id", $id)->first();

        // check if book exist
        if($user == null){
            // send respose error json
            return response()->json([
                "status" => false,
                "message" => "user tidak ditemukan",
                "data" => null
            ]);
        }

        // send response success json
        return response()->json([
            "status" => true,
            "message" => "user ditemukan",
            "data" => $user
        ]);
    }

    public function store(UserRequest $request){
        // initiate request into payload variable
        $payload = $request->all();

        if($request->file("image") != null){
            // get input file
            $file = $request->file("image");
            // hash file name
            $filename = $file->hashName();
            // move file to folder image
            $file->move("image", $filename);
            // initiate folder name + filename to path
            $path = "/image/" . $filename;
            // insert path into array payload index 'image'
            $payload['image'] = $path;
        }


        // insert data payload into database
        $user = User::create($payload);

        // send respose success json
        return response()->json([
            "status" => true,
            "message" => "",
            "data" => $user
        ]);
    }

    public function update(UserRequest $request, $id){
        // find book by id equal param id
        $user = User::find($id);
        // check if book exist
        if($user == null){
            // send respose error json
            return response()->json([
                "status" => false,
                "message" => "user tidak ditemukan",
                "data" => null
            ]);
        }

        // initiate request into payload variable
        $payload = $request->all();
        // check request
        if(!isset($payload)){
            // send respose error json
            return response()->json([
                "status" => false,
                "message" => "Tidak Ada Perubahan",
                "data" => null
            ]);
        }

        if($request->file("image") != null){
            // get input file
            $file = $request->file("image");
            // hash file name
            $filename = $file->hashName();
            // move file to folder image
            $file->move("image", $filename);
            // initiate folder name + filename to path
            $path = "/image/" . $filename;
            // insert path into array payload index 'image'
            $payload['image'] = $path;
        }


        // update db user where id equal param
        $user = User::find($id);
        $user->fill($payload);
        $user->save();

        // send respose success json
        return response()->json([
            "status" => true,
            "message" => "data berhasil di update",
            "data" => $user
        ]);
    }

    public function destroy($id){
        // find book by id equal param id
        $user = User::query()->where("id", $id)->first();

        // check if book exists
        if($user == null){
            // send respose error json
            return response()->json([
                "status" => false,
                "message" => "user tidak ditemukan",
                "data" => null
            ]);
        }

        // delete data
        $user->delete();

        // send respose success json
        return response()->json([
            "status" => true,
            "message" => "Data Berhasil Dihapus"
        ]);
    }
}
