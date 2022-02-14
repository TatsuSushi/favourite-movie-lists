<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request){
        $userID = Auth::id();

        //Display User's favourite movie(s)
        $movies = DB::table('user_favourite_movies')
            ->select('favourite_movie_id')
            ->where('user_id', $userID)
            ->get();

        return view('dashboard')
            ->with('movies', $movies)
            ;
    }

    public function addMovie(Request $request){
        $userID = Auth::id();

        DB::table('user_favourite_movies')->insert([
            'user_id' => $userID,
            'favourite_movie_id' => $request->input("movie-id")
        ]);

        return redirect('/dashboard')
            ->with('status', 'Movie has been added successfully!');
    }

    public function deleteMovie(Request $request){
        $userID = Auth::id();
        $selectedID = $request->input("movieID");

        DB::table("user_favourite_movies")
            ->where('favourite_movie_id', $selectedID)
            ->where('user_id', $userID)
            ->delete();

        return redirect('/dashboard')
            ->with('status','Movie has been successfully deleted!');
    }
}
