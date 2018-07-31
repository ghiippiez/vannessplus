<form action="{{ action('CarsController@store') }}" method="post">
    {{ csrf_field() }}
    <input type="text" name="brand" placeholder="Marka">
    <input type="text" name="model" placeholder="Model">
    <input type="text" name="doors" placeholder="Ilość drzwi">
    <input type="text" name="priceHour" placeholder="Cena za godzinę">
    <input type="text" name="priceDay" placeholder="Cena za dzień">
    <input type="text" name="priceWeek" placeholder="Cena za tydzień">
    <input type="text" name="priceMonth" placeholder="Cena za miesiąc">
    <input type="text" name="priceYear" placeholder="Cena za rok">
    <input type="submit" value="Osadź">

</form>