<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;

class Artikel {
    public static function get_all(){
        $artikel = DB::table('artikels')->get();

        return $artikel;
    }

    public static function save($data){
        unset($data["_token"]);
        $new_artikel = DB::table('artikels')->insert($data);

        return $new_artikel;
    }

    public static function update($id, $data){
        unset($data["_token"]);
        $update_artikel = DB::table('artikels')
                    ->where('id', $id)
                    ->update($data);

        return $update_artikel;
    }

    public static function delete($id){
        $delete_artikel = DB::table('artikels')
                    ->where('id', $id)
                    ->delete();

        return $delete_artikel;
    }
}
