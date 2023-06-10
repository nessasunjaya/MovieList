<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\MoviePlayed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ActorController extends Controller
{
    //

    public static function getActorMovie($actor_id){
        $movie = MoviePlayed::where('actor_id', $actor_id)->first();
        return $movie;
    }

    public function actorDetail($id){
        if(Actor::where('id', $id)->exists()){
            $actor = actor::where('id', $id)->first();

            $data = array(
                'actor' => $actor,
                'actors' => Actor::get(),
                'cast' => MoviePlayed::get()->where('actor_id', $id)
            );
            return view('actordetail', $data);
        }else{
            return view('home');
        }
    }

    public function showActors(){
        $data = array(
            'actors' => Actor::Get(),
            'roles' => MoviePlayed::Get()
        );
        return view('actors', $data);
    }

    public function addActor(Request $request){
        $actor = new Actor();

        $validation = [
            'name' => 'required | min:3',
            'gender' => 'required',
            'biography' => 'required | min:10',
            'birthdate' => 'required',
            'place_of_birth' => 'required',
            'image' => 'required | image',
            'popularity' => 'required | numeric'
        ];

        $validator = Validator::make($request->all(), $validation);
        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $file = $request->file('image');
        $imageName = time().'.'.$file->getClientOriginalExtension();

        Storage::putFileAs('public/actors/', $file, $imageName);

        $actor->name = $request->name;
        $actor->gender = $request->gender;
        $actor->biography = $request->biography;
        $actor->birthdate = $request->birthdate;
        $actor->place_of_birth = $request->place_of_birth;
        $actor->image = 'storage/actors/'.$imageName;
        $actor->popularity = $request->popularity;

        $actor->save();
        return redirect()->back();
    }

    public function editActor(Request $request){
        $actor = Actor::find($request->id);

        $validation = [
            'name' => 'required | min:3',
            'gender' => 'required',
            'biography' => 'required | min:10',
            'birthdate' => 'required',
            'place_of_birth' => 'required',
            'image' => 'required | image',
            'popularity' => 'required | numeric'
        ];

        $validator = Validator::make($request->all(), $validation);
        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $file = $request->file('image');
        $imageName = time().'.'.$file->getClientOriginalExtension();

        Storage::putFileAs('public/actors/', $file, $imageName);

        $actor->name = $request->name;
        $actor->gender = $request->gender;
        $actor->biography = $request->biography;
        $actor->birthdate = $request->birthdate;
        $actor->place_of_birth = $request->place_of_birth;
        $actor->image = 'storage/actors/'.$imageName;
        $actor->popularity = $request->popularity;

        $actor->save();
        return redirect()->back();
    }

    public function deleteActor(Request $request){
        $actor = Actor::find($request->id);
        $actor->delete();
        return redirect()->action([ActorController::class, 'showActors']);
    }
}
