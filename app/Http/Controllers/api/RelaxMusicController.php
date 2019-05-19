<?php

namespace App\Http\Controllers\api;

use App\FavouriteModel;
use App\Http\Controllers\Controller;
use App\CategoryModel;
use App\SongModel;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RelaxMusicController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $user_id = Auth::id();
        $user = User::find($user_id);
        $user->api_token = Str::random(60);
        $user->save();
        $categories = CategoryModel::all();
        return view("api.index", compact('categories'));
    }

    public function categoryDetail($category)
    {

        $songs = SongModel::where(["category_id" => $category])->get();
        //  dd($songs);
        $user_id = Auth::id();
        $token = User::find($user_id)->api_token;
        return view("api.category_detail", compact('songs', 'token'));
    }

    public function favouriteAdd()
    {

        $data = request()->only("song_id");

        $data['user_id'] = Auth::id();

        $count = FavouriteModel::where(['user_id' => $data['user_id'], 'song_id' => $data])->get()->count();

        if ($count > 0) {

            return response()->json([
                'status' => 200,
                'message' => 'this song already added your favourities.'
            ]);


        } else {
            $insert = FavouriteModel::create($data);

            if ($insert) {
                return response()->json([
                    'status' => 200,
                    'message' => 'this song inserted your favourities.'
                ]);
            } else {
                return response()->json([
                    'status' => 500,
                    'message' => 'internal server error'
                ]);
            }
        }
    }


    public function favourite()
    {

        $favourities = FavouriteModel::where(['user_id' => Auth::id()])->get();
        $user_id = Auth::id();
        $token = User::find($user_id)->api_token;

        return view("api.fav", compact('favourities', 'token'));
    }


    public function favouriteDelete()
    {

        $data = request()->only("song_id");


        $count = FavouriteModel::where(['id' => $data['song_id']])->get()->count();

        if ($count > 0) {
            FavouriteModel::where(['id' => $data['song_id']])->delete();

            return response()->json([
                'status' => 200,
                'message' => 'this song removed your favourities.'
            ]);


        } else {

            return response()->json([
                'status' => 200,
                'message' => '!!! this song didnt find in  your favourities.'
            ]);
        }
    }

}
