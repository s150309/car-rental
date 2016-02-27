<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'reservations';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['imie', 'nazwisko', 'email', 'data_od', 'data_do', 'moment_rezerwacji', 'wypozyczono', 'samochod_id', 'do_zaplaty_lacznie'];

}
