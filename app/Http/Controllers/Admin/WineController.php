<?php

namespace App\Http\Controllers\Admin;

use App\Models\Wine;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWineRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $winesList = Wine::all();

        return view('admin.wines.index', compact('winesList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.wines.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWineRequest $request)
    {

        $newWine = new Wine();
        $newWine->fill($request->all());
        $newWine->slug = Str::slug($newWine->wine);
        $newWine->save();
        return redirect()->route('admin.wines.show', $newWine->slug);

    }

    /**
     * Display the specified resource.
     */
    public function show(Wine $wine)
    {


        return view('admin.wines.show',compact('wine'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreWineRequest $request, Wine $wine)
    {
        $wine->fill($request->all());
        $wine->slug = Str::slug($wine->wine);
        $wine->save();
        return redirect()->route('admin.wines.show',[$wine->slug]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wine $wine)
    {
        $wine->delete();
        return redirect()->route('admin.wines.index')->with('message', 'The project '. $wine->wine . ' is delete!');
    }
}
