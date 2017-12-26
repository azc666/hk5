<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    {{-- <img src="http://arh4.dev/assets/ARH_Logo.jpg" style="max-width:300px;" alt="ARH Logo" class="img-responsive move-right move-down"><br> --}}
    {!! $cartOrder !!}
    <div class="thumbnail">
        <div class="caption">
            <h5 class="move-up">Questions about this order should be directed to:</h5>
            <strong>Order Portal Admin</strong><br>
            {{ Html::mailto('support@arhorderportal.com') }} <br>
            <a href="{{ url('http://www.g-d.com') }}" title="ARH Order Portal Support">www.g-d.com</a> <br>
            Ph: 813-254-9444 <br>
            Fax: 813-254-9445 <br>
        </div>    
    </div>
</body>
</html>