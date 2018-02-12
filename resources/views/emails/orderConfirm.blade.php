<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    {{-- <a href="http://google.com" title="">google</a> --}}
    {{-- {!! $showMyOrder !!} --}}
    {{-- {{dd($showMyOrder)}} --}}
    {!! $cartOrder !!}
    <div class="thumbnail">
        <div class="caption">
            <h5 class="move-up">Questions about this order should be directed to:</h5>
            <strong>Order Portal Admin</strong><br>
            {{ Html::mailto('support@g-d.com') }} <br>
            <a href="{{ url('http://www.g-d.com') }}" title="HK Order Portal Support">www.g-d.com</a> <br>
            Ph: 813-254-9444 <br>
            Fax: 813-254-9445 <br>
        </div>    
    </div>
    
</body>
</html>