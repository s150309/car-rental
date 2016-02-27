<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Car;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class CarsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $cars = Car::paginate(15);

        return view('cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['nazwa' => 'required', 'segment' => 'required', 'cena_dzien' => 'required', ]);

        Car::create($request->all());

        Session::flash('flash_message', 'Car added!');

        return redirect('cars');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function show($id)
    {
        $car = Car::findOrFail($id);

        return view('cars.show', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $car = Car::findOrFail($id);

        return view('cars.edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $this->validate($request, ['nazwa' => 'required', 'segment' => 'required', 'cena_dzien' => 'required', ]);

        $car = Car::findOrFail($id);
        $car->update($request->all());

        Session::flash('flash_message', 'Car updated!');

        return redirect('cars');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        Car::destroy($id);

        Session::flash('flash_message', 'Car deleted!');

        return redirect('cars');
    }

}
