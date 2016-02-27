<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Reservation;
use App\Car;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

use Illuminate\Http\RedirectResponse;


class ReservationsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $reservations = Reservation::paginate(15);

        return view('reservations.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request, $id)
    {
       
        return view('reservations.create')->withId($id);
    }
    
    
        public function dotpay(Request $request)
    {
        return view('reservations.create');
    }
    
    
   
    
    

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['imie' => 'required', 'nazwisko' => 'required', 'email' => 'required', 'data_od' => 'required', 'data_do' => 'required', 'moment_rezerwacji' => 'required', 'samochod_id' => 'required', 'do_zaplaty_lacznie' => 'required', ]);

        Reservation::create($request->all());

        Session::flash('flash_message', 'Reservation added!');

        return redirect('reservations');
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
        $reservation = Reservation::findOrFail($id);

        return view('reservations.show', compact('reservation'));
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
        $reservation = Reservation::findOrFail($id);

        return view('reservations.edit', compact('reservation'));
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
        $this->validate($request, ['imie' => 'required', 'nazwisko' => 'required', 'email' => 'required', 'data_od' => 'required', 'data_do' => 'required', 'moment_rezerwacji' => 'required', 'samochod_id' => 'required', 'do_zaplaty_lacznie' => 'required', ]);

        $reservation = Reservation::findOrFail($id);
        $reservation->update($request->all());

        Session::flash('flash_message', 'Reservation updated!');

        return redirect('reservations');
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
        Reservation::destroy($id);

        Session::flash('flash_message', 'Reservation deleted!');

        return redirect('reservations');
    }

}
