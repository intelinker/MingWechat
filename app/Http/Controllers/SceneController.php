<?php

namespace App\Http\Controllers;

use App\Order;
use App\Scene;
use App\Seat;
use App\Theartre;
use Illuminate\Http\Request;

class SceneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $scenes = Scene::orderBy('created_at', 'desc')->paginate(15);
        $totalScenes = Scene::count();
        return view('scenes/index', ['scenes'=>$scenes, 'totalScenes'=>$totalScenes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $theatres = Theartre::all();
        return view('scenes/create', ['theatres' => $theatres, 'selectedTheatre' => $theatres[0]]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $scene = Scene::create($request->except('_token'));
        $alphaBetas = array('A', 'B', 'C', 'E', 'F', 'G', 'H', 'I', 'J', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
        for ($i=1; $i<=$scene->lines; $i++) {
            for ($j=0; $j<$scene->rows; $j++) {
                Seat::create([
                    'description' => $i.'排'.$alphaBetas[$j],
                    'scene_id'    => $scene->id,
                    'available'   => 1,
                    'line'        => $i,
                    'row'         => $j+1,
                    'playtime'    => $scene->playtime,
                    'price'       => $scene->price,
                ]);
            }
        }
//        return $theatre;
        return redirect()->action('SceneController@edit', ['scene'=>$scene]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Scene  $scene
     * @return \Illuminate\Http\Response
     */
    public function show(Scene $scene)
    {
        $user = session('wechat.oauth_user');
        $seats = Seat::where('scene_id', $scene->id)->get();
        $orders = Order::where('openid', $user->getId())->get();
//        $orders = Order::where('model', $scene->id)->where('openid', $user->getId())->get();
        return view('scenes/show', ['seats'=>$seats, 'orders'=>$orders, 'lines'=>$scene->lines, 'rows'=>$scene->rows]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Scene  $scene
     * @return \Illuminate\Http\Response
     */
    public function edit(Scene $scene)
    {
        $seats = Seat::where('scene_id', $scene->id)->get();
        return view('scenes/edit', ['seats'=>$seats, 'lines'=>$scene->lines, 'rows'=>$scene->rows]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Scene  $scene
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Scene $scene)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Scene  $scene
     * @return \Illuminate\Http\Response
     */
    public function destroy(Scene $scene)
    {
        //
    }

    public function createForTheatre($theatreid) {
        $theatres = Theartre::all();
        $theatre = Theartre::findOrFail($theatreid);
        return view('scenes/create', ['theatres' => $theatres, 'selectedTheatre' => $theatre]);
    }
}
