<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use App\Http\Requests\CarsRequest;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $objList = Cars::all();
        return view('/cars_list', [
            'listCars'=> $objList,
            'listHead'=> 'Содержимое таблицы cars:'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('/add_cars', ['addCars'=> 'Добавить новое авто']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarsRequest $request)
    {
        Cars::create([
            'brand'=> $request-> brand,
            'model'=> $request-> model,
            'price'=> $request-> price
        ]);
        return redirect('/cars_list');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Cars::findOrFail($id);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(CarsRequest $request, Cars $cars)
    {
        $cars->fill($request->validate());
        return $cars->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cars $cars)
    {
        if ($cars->delete()) {
            return response(content:null, status:404);
        }
        return null;
    }
}
