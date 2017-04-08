<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container-fluid">



    <div class="row-fluid">
        <div class="col-md-offset-4 col-md-4" id="box">
            <h2>Register</h2>

            <form class="form-horizontal" action="" id="signup_form">
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon3"><i class="glyphicon glyphicon-user"></i></span>
                            <input name="username" placeholder="Username" class="form-control" type="text">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon4"><i class="glyphicon glyphicon-user"></i></span>
                            <input name="first_name" placeholder="First Name" class="form-control" type="text">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <input name="last_name" placeholder="Last Name" class="form-control" type="text">
                    </div>
                </div>
                <div class="form-group">

                    <div class="col-md-12">
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon4"><i class="glyphicon glyphicon-lock"></i></span>
                            <input name="password" placeholder="Password" class="form-control" type="password">
                        </div>
                    </div>
                </div>
                <div class="form-group">

                    <div class="col-md-12">
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon5"><i class="glyphicon glyphicon-ok"></i></i></span>
                            <input name="password_verification" placeholder="Password Verification" class="form-control" type="password">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon6"><i class="glyphicon glyphicon-envelope"></i></span>
                            <input name="email" placeholder="Email" class="form-control" type="email">
                        </div>
                    </div>
                </div>
                <div class="form-group">

                    <div class="col-md-12">
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon7"><i class="glyphicon glyphicon-earphone"></i></span>
                            <input name="phone" placeholder="Phone" class="form-control" type="tel">
                        </div>
                    </div>
                </div>
                <input type="submit" class="btn btn-info" value="Submit">
            </form>

        </div>
    </div>

</div>



</body>
</html>