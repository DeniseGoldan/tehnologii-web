@extends('main')

@section('stylesheets')

    <link rel="stylesheet" href="css/mapView_styles.css">
    {{Html::style('css/sweetalert.css')}}

@stop

@section('content')



    <div class="container-fluid well">
            <div class="row">
                <div class="container-fluid col-sm-3">
                    <form class="myWell" method="GET" id="filterForm">
                        <h3>Apply filters</h3>
                        <fieldset>
                            <h4 class="filter-name">Transaction</h4>
                            <div class="container">
                                <label class="label-for-checkbox">
                                    <input type="checkbox" name="buyCheck" id="buyCheck">Buy
                                </label>
                                <label>
                                    <input type="checkbox" name="rentCheck" id="rentCheck">Rent
                                </label>
                            </div>
                        </fieldset>
                        <fieldset>
                            <h4 class="filter-name">Property type</h4>
                            <div class="container">
                                <label class="label-for-checkbox">
                                    <input type="checkbox" name="houseCheck" id="houseCheck">House</label>
                                <label>
                                    <input type="checkbox" name="apartmentCheck" id="apartmentCheck" checked="checked">Apartment
                                </label>
                            </div>
                        </fieldset>
                        <fieldset>
                            <h4 class="filter-name">Price</h4>
                            <div class="container">
                                <label>Between</label>
                                <input type="text" class="numberInput" id="priceMin" name="priceMin" style="width:70px;">
                                <label> and </label>
                                <input type="text" class="numberInput" id="priceMax" name="priceMax" style="width:70px;">
                                <p style="display:inline">&euro;</p>
                            </div>
                        </fieldset>
                        <fieldset>
                            <h4 class="filter-name">Number of rooms</h4>
                            <div class="container">
                                <label>Between</label>
                                <input type="text" class="numberInput" id="roomsMin" name="roomsMin" style="width:70px;">
                                <label> and </label>
                                <input type="text" class="numberInput" id="roomsMax" name="roomsMax" style="width:70px;">
                            </div>
                        </fieldset>
                        <fieldset>
                                <h4 class="filter-name">Surface</h4>
                                <div class="container">
                                    <label>Between</label>
                                    <input type="text" class="numberInput" id="surfaceMin" name="surfaceMin" style="width:70px;">
                                    <label> and </label>
                                    <input type="text" class="numberInput" id="surfaceMax" name="surfaceMax" style="width:70px;">
                                    <p style="display:inline">m²</p>
                                </div>
                        </fieldset>
                        <div class="container">
                            <p class="btn1" data-placement="top" data-toggle="tooltip" title="Add pins of the filtered properties on the map">
                                <input type="button" value="Show on map" class="submit btn btn-success add-margin-top" name="map" id="showFiltered" onclick="fetchLocations()">
                            </p>
                            <p class="btn2" data-placement="top" data-toggle="tooltip" title="Go to a page where you can view the results">
                                <button type="submit" formaction="{{URL('/properties/listView')}}" class="submit btn btn-success add-margin-top" name="list">List  homes</button>
                            </p>
                            <br clear="left">
                        </div>
                            <div name="LatLng">
                            <input name="latitude" type="hidden" id="latitude">
                            <input name="longitude" type="hidden" id="longitude">
                            <input name="country" type="hidden" id="country">
                            <input name="city" type="hidden" id="city">
                            </div>
                    </form>
                 </div>       

                <div class="container-fluid col-sm-9 right-padding">
                    <fieldset>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-send"></i></span>
                            <input name="search" placeholder="Change location" class="form-control" id="pac-input" type="text">
                        </div>
                    </fieldset>
                    <div id="googleMap" style="width:100%;height:485px;"></div>
                
                    <div class="input-group">
                        <div class="input-group-btn">
                            <button type="button" id="pollutionLayer"  class="btn-sm  btn-default" onclick="togglePollution()" style="background-color:#ffc800;">Pollution</button>
                            <button type="button" id="noiseLayer" class="btn-sm btn-default" onclick="toggleNoise()" style="background-color:#00ffff;">Noise</button>
                            <button type="button" id="criminalityLayer" class="btn-sm btn-default" onclick="toggleCriminality()" style="background-color:red">Criminality</button>
                        </div>
                    </div>
                </div>
        </div>

    </div>


@stop

@section('scripts')
    
     {{Html::script('js/sweetalert-dev.js')}}
     <script type="text/javascript" src="js/setBuyRentCheck.js"></script>
     <script type="text/javascript" src="js/mapView.js"></script>
     <script type="text/javascript" src="js/mapViewForceNumeric.js"></script>
     <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBRGPzmuWJ-rKRoTIZnJcNMrfdfmYwg7XQ&libraries=places,visualization&callback=initMap"
        async defer></script>

@stop