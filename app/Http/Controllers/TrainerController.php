<?php

namespace LaraDex\Http\Controllers;

use LaraDex\Trainer;
use Illuminate\Http\Request;
use LaraDex\Http\Requests\StoreTrainerRequest;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $trainers = Trainer::all();
        $request->user()->authorizeRoles(['admin']);
        return view('trainers.index', compact('trainers'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('trainers.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTrainerRequest $request)
    {
        if($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $name = time() . $file->getClientOriginalName();
            $file->move(public_path().'/images/', $name);
        }

        $trainer = new Trainer();
        $trainer->name = $request->input('name');
        $trainer->avatar = $name;
        $trainer->slug =  $request->input('slug');
        $trainer->save();
    
        return redirect()->route('trainers.show', ['trainer' => $trainer, 'id' => $trainer->id, 'slug' => $trainer->slug])->with('status', 'Ha creado su entrenador pokemon correctamente!');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  string|null $slug
     * @return \Illuminate\Http\Response
     */
    public function show($id, $slug = null)
    {
        $trainer = Trainer::findOrFail($id);
        return view('trainers.show', compact('trainer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $trainer = Trainer::findOrFail($id);
        return view('trainers.edit', compact('trainer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $trainer = Trainer::findOrFail($id);
        $trainer->fill($request->except('avatar'));
        if($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $name = time() . $file->getClientOriginalName();
            $trainer->avatar = $name;
            $trainer->slug =  $request->input('slug');
            $file->move(public_path().'/images/', $name);
        }
        $trainer->save();

        return redirect()->route('trainers.show', ['trainer' => $trainer, 'id' => $trainer->id, 'slug' => $trainer->slug])->with('status', 'Entrenador actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trainer = Trainer::findOrFail($id);
        $file_path = public_path() . '/images/' . $trainer->avatar;
        \File::delete($file_path);

        $trainer->delete();
        return redirect()->route('trainers.index')->with('status', 'Ha eliminado el usuario correctamente');
    }
}
