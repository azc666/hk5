<html>
    <head>
        <title>Contact Us</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/product.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-maxlength/1.7.0/bootstrap-maxlength.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    </head>
    <body>

    <div class="container"> 
        <div class="row body-background">
            <div class="col-md-6 col-md-offset-1">
                <img src="http://arh4.app/assets/header2.png" style="max-width:600px;" alt="ARH Logo" class="img-responsive move-right move-down"><br>
            </div>
            <div class="col-md-8 col-md-offset-2">
                <h4>Hi {{ Session::get('contactus_name') }},<br><br>
                Thank you for contacting {{ Html::mailto('support@arhorderportal.com') }}. </h4>

                <h5>Your support request has been received and we will get back to you ASAP!</h5>
                <br>

        <div class="container">
            <div class="col-md-6">
                <h5>Your Inquiry:</h5>
                &nbsp;{{Session::get('contactMessage')}}
            </div>
        </div>

        <br><br>

        <strong>Questions about this Support Request should be directed to:</strong><br>
        Order Portal Admin, Graphics + Design<br>
        {{ Html::mailto('support@arhorderportal.com') }} <br>
        <a href="{{ url('http://www.g-d.com') }}" title="G+D Support">www.g-d.com</a> <br>
        Ph: 813-254-9444 <br>
        Fax: 813-254-9445 <br><br><br>
        </div>
    </div>
</div>
</body>
</html>
