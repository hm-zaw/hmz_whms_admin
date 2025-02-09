<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = ['name', 'born', 'category', 'image', 'description', 'email'];

//    public static function find($id): array {
//        $member = Arr::first(self::all(), fn($mmm) => $mmm['id'] == $id);
//
//        if (!$member) {
//            abort(404);
//        }
//
//        return $member;
//    }
}
