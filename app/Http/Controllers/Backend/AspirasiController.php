<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aspirasi;
use App\Http\Requests\AspirasiRequest;

class AspirasiController extends Controller
{
    public function index(){
        // get all data table aspirasi, kategori and author using join
        $aspirasi = Aspirasi::select(
            "*",
        )
        ->join("users", "users.id", "=", "aspirasis.id_user")
        ->get();
        
        // send response success json
        return response()->json([
            "status" => true,
            "message" => "data ditemukan",
            "data" => $aspirasi,
        ]);
    }

    public function show($id){
        // get book by id equal param id
        $aspirasi = Aspirasi::query()->where("id", $id)->first();

        // check if book exist
        if($aspirasi == null){
            // send respose error json
            return response()->json([
                "status" => false,
                "message" => "aspirasi tidak ditemukan",
                "data" => null
            ]);
        }

        // send response success json
        return response()->json([
            "status" => true,
            "message" => "aspirasi ditemukan",
            "data" => $aspirasi
        ]);
    }

    public function store(AspirasiRequest $request){
        // initiate request into payload variable
        $payload = $request->all();

        if($request->file("gambar") != null){
            // get input file
            $file = $request->file("gambar");
            // hash file name
            $filename = $file->hashName();
            // move file to folder image
            $file->move("image", $filename);
            // initiate folder name + filename to path
            $path = "/image/" . $filename;
            // insert path into array payload index 'gambar'
            $payload['gambar'] = $path;
        }


        // insert data payload into database
        $aspirasi = Aspirasi::create($payload);

        // send respose success json
        return response()->json([
            "status" => true,
            "message" => "",
            "data" => $aspirasi
        ]);
    }

    public function update(AspirasiRequest $request, $id){
        // find book by id equal param id
        $aspirasi = Aspirasi::find($id);
        // check if book exist
        if($aspirasi == null){
            // send respose error json
            return response()->json([
                "status" => false,
                "message" => "aspirasi tidak ditemukan",
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

        if($request->file("gambar") != null){
            // get input file
            $file = $request->file("gambar");
            // hash file name
            $filename = $file->hashName();
            // move file to folder image
            $file->move("image", $filename);
            // initiate folder name + filename to path
            $path = "/image/" . $filename;
            // insert path into array payload index 'gambar'
            $payload['gambar'] = $path;
        }


        // update db aspirasi where id equal param
        $aspirasi = Aspirasi::find($id);
        $aspirasi->fill($payload);
        $aspirasi->save();

        // send respose success json
        return response()->json([
            "status" => true,
            "message" => "data berhasil di update",
            "data" => $aspirasi
        ]);
    }

    public function destroy($id){
        // find book by id equal param id
        $aspirasi = Aspirasi::query()->where("id", $id)->first();

        // check if book exists
        if($aspirasi == null){
            // send respose error json
            return response()->json([
                "status" => false,
                "message" => "aspirasi tidak ditemukan",
                "data" => null
            ]);
        }

        // delete data
        $aspirasi->delete();

        // send respose success json
        return response()->json([
            "status" => true,
            "message" => "Data Berhasil Dihapus"
        ]);
    }
}
