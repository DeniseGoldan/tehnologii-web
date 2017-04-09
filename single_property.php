<html>
    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="single_property.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        

    </head>
    <body>
    <div class="container-fluid text-center topSection">
        <div class="col-sm-1"></div>
        <div class="col-sm-11">

            <div class="col-sm-8 text-left">
                    <h3>Apartament 2 camere Bucuresti</h3>
                    <h4>Calea Kisselef, Bucuresti, Romania</h4>
                </div>
            <div class="col-sm-4 text-center">
                    <h2>10.250.000&euro;</h2>
                </div>

            <div class="col-sm-8">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                        <li data-target="#myCarousel" data-slide-to="3"></li>
                        <li data-target="#myCarousel" data-slide-to="4"></li>
                        <li data-target="#myCarousel" data-slide-to="5"></li>
                        <li data-target="#myCarousel" data-slide-to="6"></li>
                        <li data-target="#myCarousel" data-slide-to="7"></li>
                        <li data-target="#myCarousel" data-slide-to="8"></li>
                        <li data-target="#myCarousel" data-slide-to="9"></li>
                        <li data-target="#myCarousel" data-slide-to="10"></li>
                        <li data-target="#myCarousel" data-slide-to="11"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">

                        <div class="item active">
                            <img  src="data/images/house1/1.jpg" alt="1">
                        </div>

                        <div class="item">
                            <img  src="data/images/house1/2.jpg" alt="2">
                        </div>

                        <div class="item">
                            <img  src="data/images/house1/3.jpg" alt="3">
                        </div>

                        <div class="item">
                            <img  src="data/images/house1/4.jpg" alt="4">
                        </div>

                        <div class="item">
                            <img  src="data/images/house1/5.jpg" alt="5">
                        </div>

                        <div class="item">
                            <img  src="data/images/house1/6.jpg" alt="6">
                        </div>

                        <div class="item">
                            <img  src="data/images/house1/7.jpg" alt="7">
                        </div>

                        <div class="item">
                            <img  src="data/images/house1/8.jpg" alt="8">
                        </div>

                        <div class="item">
                            <img  src="data/images/house1/9.jpg" alt="9">
                        </div>

                        <div class="item">
                            <img  src="data/images/house1/10.jpg" alt="10">
                        </div>

                        <div class="item">
                            <img  src="data/images/house1/11.jpg" alt="5">
                        </div>

                        <div class="item">
                            <img  src="data/images/house1/12.jpg" alt="5">
                        </div>



                    </div>

                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <div class="jumbotron" style="margin-top: 30px; ">
                    <div class="row">
                        <div class ="col-sm-4 text-center">
                            <h4>Surface</h4>
                            <h5>100 m2</h5>
                        </div>
                        <div class ="col-sm-4 text-center">
                            <h4>Floor</h4>
                            <h5>4</h5>
                        </div>
                        <div class ="col-sm-4 text-center">
                            <h4>Rooms</h4>
                            <h5>3</h5>
                        </div>
                    </div>
                </div>
                <div id="map" style="width: 100%;  padding-top: 100%; margin-bottom: 30px"></div>
                <script>
                    function initMap() {
                        var position = {lat: 44.465626, lng: 26.078406};
                        var map = new google.maps.Map(document.getElementById('map'), {
                            zoom: 19,
                            center: position
                        });
                        map.setMapTypeId('satellite');
                        var marker = new google.maps.Marker({
                            position: position,
                            map: map
                        });
                    }
                </script>
                <script async defer
                        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBQCQ1quNQm1Geb__wZNXjJrPqT6VzyaNY&callback=initMap">
                </script>

            </div>
            <div class="col-sm-4 text-center">
                <div class="jumbotron" >
                    <img src="data/images/userph.png" class="img-responsive center-block" alt="user_placeholder" style="width: 50%; height: auto">
                    <h4>Ion Vasilescu</h4>
                    <h4><span class="glyphicon glyphicon-phone-alt"></span> +40 737 665 283</h4>
                    <h4>Send a message: </h4>
                    <form class="form-horizontal" action id="send_mail_form" style="padding: 10px;">
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input name="email" placeholder="E-Mail" class="form-control" type="text" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea class="form-control" rows="5" placeholder="Enter message!" required></textarea>
                                </div>
                            </div>
                        </div>

                        <input type="submit" class="btn btn-info" value="Send">

                    </form>

                </div>

            </div>
        </div>



    </div>
    </body>
</html>
