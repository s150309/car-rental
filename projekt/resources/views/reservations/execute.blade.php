@extends('layouts.master')

@section('content')


<h1>Wykonałeś właśnie rezerwację na {{$input['samochod']['nazwa']}}</h1>
<h4>Klikając w poniższy przycisk przejdź do serwisu dotpay.pl i zapłać {{$input['kwota']}} zł. aby sfinalizować wypożyczenie.</h4>


<form action="https://ssl.dotpay.pl/test_payment/" method="post">

<input type="hidden" name="id" value="721123">
<!-- wpisz swój numer id otrzymany od Dotpay.pl -->

<input type="hidden" name="lang" value="pl">
<!-- dostepne wersje jezykowe: pl, en, de, it, fr, es, cz, ru, bg -->

<input type="hidden" name="opis" value="Wypożyczenie samochodu {{$input['samochod']['nazwa']}}">
<!-- domyślny opis transakcji -->


<input type=hidden name="url" value="http://rysinski.pl"><br>
<!-- wpisz podaj adres url na ten adres zostanie przekirowany user po zkończeniu tranzakcji w dotpay np. http://mojaDomena.pl/index.php?zam=35 -->


<input type=hidden name="control" value="{{$input['id_rezerwacji']}}">
<!-- np numer zamówienia -->

<input type=hidden name="type" value="1">

<input type=hidden name="txtguzik" value="Powrót do serwisu">

<input type=hidden name="URLC" value="http://rent-a-car.esy.es/realise_order">

<input type="hidden" name="kwota" value="{{$input['kwota']}}" size="15">
<input type="submit" class="btn btn-success" value="Wykonaj płatność" name="b1"></td>
</form>


@endsection
