<?php


namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Car;
use App\Reservation;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;




class HomeController extends Controller{
    
    
    
        public function index()
    {
            
        $trzy_minuty_temu = Carbon::now()->addMinutes(-3);
         
        $rezerwacje = Reservation::where("moment_rezerwacji", ">=", $trzy_minuty_temu)->lists('samochod_id');
        
        
        $dzisiaj = Carbon::today();
        
        $dzisiaj = $dzisiaj->format('Y-m-d');
        
        $wypozyczenia = Reservation::where("wypozyczono", "=", "1")->where("data_od", "<=", $dzisiaj)->where("data_do", ">=", $dzisiaj)->lists('samochod_id');

        $rezerwacje = $rezerwacje->merge($wypozyczenia);
        
        
        $cars = Car::whereNotIn('id', $rezerwacje)->paginate(15);
      

        return view('home.index', compact('cars'));
    }
    
    
    
        public function status(Request $request)
    {
            
        $status =  $request->input('status');
        
        $id_zamowienia = $request->input('control');

        return view('home.status');
    }
    
    
    
    

    
    
}