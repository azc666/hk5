<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body style="margin: 2px; padding: 2px;">
    {{-- <img src="http://arh4.dev/assets/ARH_Logo.jpg" style="max-width:300px;" alt="ARH Logo" class="img-responsive move-right move-down"><br> --}}
    
<h3>Hi {{ Session::get('contactus_name') }},<br><br>
Thank you for contacting {{ Html::mailto('support@arhorderportal.com') }}. </h3>

<h4>Your support request has been received and we will get back to you ASAP!</h4>

{{-- <h4>Your Inquiry</h4> --}}

<table align="center" border="1" cellpadding="1" cellspacing="1" width="100%">
    <caption><strong>Your Inquiry</strong></caption>
    <thead>
        <tr>
            <th>Subject</th>
            <th>Response</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>&nbsp;Your Name</td>
            <td>&nbsp;{{Session::get('contactus_name')}}</td>
        </tr>
        <tr>
            <td>&nbsp;Your Email</td>
            <td>&nbsp;{{Session::get('contactus_email')}}</td>
        </tr>
        
        <tr>
            <td>&nbsp;Location Name</td>
            <td>&nbsp;{{Session::get('loc_name')}}</td>
        </tr>
        <tr>
            <td>&nbsp;Location Number</td>
            <td>&nbsp;{{Session::get('loc_num')}}</td>
        </tr>
        
        <tr>
            <td>&nbsp;Portal Support Request</td>
            <td>&nbsp;{{Session::get('portalSupport')}}</td>
        </tr>
        <tr>
            <td>&nbsp;Product Info Request</td>
            <td>&nbsp;{{Session::get('productInfo')}}</td>
        </tr>
        <tr>
            <td>&nbsp;Other Support Request</td>
            <td>&nbsp;{{Session::get('other')}}</td>
        </tr>
 <tr>
            <td>&nbsp;Your Message</td>
            <td>&nbsp;{{Session::get('contactMessage')}}</td>
        </tr>

    </tbody>
</table>

<br><br>
    <strong>Questions about this Support Request should be directed to:</strong><br><br>
    Order Portal Admin, Graphics + Design<br>
    {{ Html::mailto('support@arhorderportal.com') }} <br>
    <a href="{{ url('http://www.g-d.com') }}" title="G+D Support">www.g-d.com</a> <br>
    Ph: 813-254-9444 <br>
    Fax: 813-254-9445 <br><br><br>
    
</body>
</html>