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
    
    
        
        public function execute(Request $request)
    {
            
            
         
            
           $czas_teraz = Carbon::now();
            
     
           $data_od = Carbon::parse($request->input('data_od'));
           $data_do = Carbon::parse($request->input('data_do'));
           $wypozyczenie_ile_dni = $data_od->diffInDays($data_do) + 1;
           
           $samochod_id = $request->input('car_id');
           $imie = $request->input('imie');
           $nazwisko = $request->input('nazwisko');
           $email = $request->input('email');
           
           $samochod = Car::find($samochod_id);
           
           $cena_dzien = $samochod->cena_dzien;
           
           
           $zaplata_lacznie = $cena_dzien * $wypozyczenie_ile_dni;
           
           
           
           $rezerwacja = new Reservation();
           
           $rezerwacja->imie = $imie;
           $rezerwacja->nazwisko = $nazwisko;
           $rezerwacja->email = $email;
           $rezerwacja->data_od = $data_od;
           $rezerwacja->data_do = $data_do;
           $rezerwacja->moment_rezerwacji = $czas_teraz;
           $rezerwacja->wypozyczono = false;
           $rezerwacja->samochod_id = $samochod_id;
           $rezerwacja->do_zaplaty_lacznie = $zaplata_lacznie;
           
           $rezerwacja->save();
           

           

           
           $dotpay = array();
           $dotpay['id'] = "721123";
           $dotpay['lang'] = "pl";
           $dotpay['opis'] = "Wypożyczenie samochodu";
           $dotpay['id_rezerwacji'] = $rezerwacja->id;
           $dotpay['type'] = "1";
           $dotpay['txtguzik'] = "Powrót do wypożyczalni";
           $dotpay['URLC'] = "http://rysinski.pl/realise_order";
           $dotpay['kwota'] = $zaplata_lacznie;
           $dotpay['samochod'] = $samochod;
           
           
           $request->request->add($dotpay);
           
           $input = $request->all();
           
           return view('reservations.execute', compact('input'));



           
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
