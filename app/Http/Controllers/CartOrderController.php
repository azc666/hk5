<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Order;
use Auth;
use Cart;
use App\User;
use App\Classes\LayoutHelpersClass;
use File;
use Carbon\Carbon;
// use App\Mail;
use App\Mail\OrderConfirmEmail;
use App\Mail\OrderProductionEmail;
use Session;

class CartOrderController extends Controller
{
    public function show(Request $request, Product $product, Category $category)
        
    {
        $cartOrderEmail = '';
        $cartOrder = '';
        $cartOrderProduction = '';
        $confirmation = '';
        $dt = Carbon::now();
        $dt = substr($dt->year, -2) . $dt->month . $dt->day . '-' . $dt->hour . $dt->minute . $dt->second;
        $confirmation = Auth::user()->loc_num . '-' . $dt;
        $order = new Order();
       
       if ($request->confirm) {

        $cartOrderEmail = '';
        $cartOrderEmail .= ' <!DOCTYPE html>
        <html>
        <head> 
            <title></title>
            <link rel="stylesheet" href="css/style.css">
            <link rel="stylesheet" href="css/product.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-maxlength/1.7.0/bootstrap-maxlength.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        </head>
        <body> ';

        // $cartOrder .= ' <!DOCTYPE html>
        // <html>
        // <head>
        //     <meta name="keywords" content="parker2">
        // </head>';

        $cartOrder .= '<div class="container">';
            
        $cartOrder .= '<div class="row body-background">';

        $cartOrder .= '<br>

        <div class="col-sm-12 col-md-12 col-lg-12">

            <img src="https://hkorderportal.com/assets/HKheader2.png" style="max-width:500px;" alt="HK Logo" class="img-responsive move-right move-down"><br>

            <div class="thumbnail">
                <div class="caption">
                    <h3 class="move-up">Order Confirmation Receipt</h3>
                    <p> <strong>HK' . Auth::user()->loc_num . '&nbsp;&nbsp;&nbsp;' . Auth::user()->loc_name. '&nbsp;&nbsp;&nbsp;' . date("m/d/Y") . '&nbsp;&nbsp;&nbsp; Confirmation: ' . $confirmation . '</strong></p>
                    <h5 class="move-up">Thank You. Your order has been placed. This confirmation has been emailed to admin: ' . Auth::user()->contact_a . ' ( <a href="mailto:' . Auth::user()->email_a . '">' . Auth::user()->email_a . '</a> ).</h5>
                    <h5 class="move-up">Your order will be shipped to:</h5>
                    <strong>' . Auth::user()->loc_name . '</strong><br>
                    Attn: ' . Auth::user()->contact_s . '<br>';

                    if (Auth::user()->address2_s) {
                       $address_s = 
                        Auth::user()->address1_s . '<br>' .
                        Auth::user()->address2_s . '<br>' .
                        Auth::user()->city_s . ', ' . Auth::user()->state_s . ' ' . Auth::user()->zip_s . '<br><br>';
                    } else {
                        $address_s = 
                        Auth::user()->address1_s . '<br>' .
                        Auth::user()->city_s . ', ' . Auth::user()->state_s . ' ' . Auth::user()->zip_s . '<br><br>';
                    }
                    
                    $cartOrder .= $address_s;

                    $cartOrder .= '<p class="move-down"></p>
                </div>    
            </div>
        </div>  

        <table class="table">
            <thead>
                <tr>
                    <th class="table-image"></th>
                    <th>&nbsp;Product</th>
                    <th>Quantity</th>
                    
                    
                    <th></th>
                </tr>
            </thead>';

        $cartOrder .= '<tbody>';

        foreach (Cart::content() as $item) {
            $cartOrder .= '<tr>
            <div class="' . $item->options->name . '">
            <div class="' . $item->options->title . '">
            <div class="' . $item->options->email . '">
            <div class="' . $item->options->address1 . '">
            <div class="' . $item->options->address2 . '">
            <div class="' . $item->options->city . '">
            <div class="' . $item->options->state . '">
            <div class="' . $item->options->zip . '">
            <div class="' . $item->options->phone . '">
            <div class="' . $item->options->fax . '">
            <div class="' . $item->options->cell . '">
            <div class="' . $item->options->specialInstructions . '">
            <td class="table-image">
            <a href="' . url(substr_replace($item->options->proofPath, 'pdf', -3)) . '" target="_blank"><img src="' . url($item->options->proofPath) . '"width=200px" alt="proof" class="img-responsive cart-image move-right dropshadow"></a>
            </td>

            <td><strong>' . strip_tags($item->name) . '</strong>
            <br>' . nl2br($item->options->prod_description) . '
            </td>

            <td>';

            $cartOrder .= '<span class = "quantity">' . $item->qty . ' &nbsp;&nbsp;&nbsp; ';
            $cartOrder .= '<br><br>';

            if ( $item->options->specialInstructions ) {
                $cartOrder .= '<div class="thumbnail" style="width:275px; font-size:12px">
                <h5 class="move-up">Special Instructions:</h5>' . $item->options->specialInstructions . '</div>';
            }
                    
            // $cartOrder .= '</div>
            // </td>
            // <td>$' . number_format($item->subtotal, 2) . '</td>
            // <td class=""></td>
                       
            // </tr>';
        }

        
            
            $cartOrder .= '


        </tbody>
        </table>';

        $cartOrder .= '</div>
                    </div> <!-- end container -->   
                <div class="spacer"></div>
            </div> <!-- end container -->
        <div class="container">';

//////////////////////  SAVE THE ORDER TO DB  //////////////////        

        Session::put('cartOrder', $cartOrder);
        $order->cart = $cartOrder;
        $order->name = Auth::user()->loc_name;
        $order->contact_s = Auth::user()->contact_s;
        $order->address_s = $address_s;
        $order->confirmation = $confirmation;
        $order->subtotal = Cart::subtotal();
        
        Session::put('confirmation', $confirmation);
        Auth::user()->orders()->save($order);

//////////////  CREATE $cartOrderProduction  /////////////

        $cartOrderProduction .= '';

        foreach (Cart::content() as $item_prod) {
            $cartOrderProduction .= '<table class="table table-bordered table-striped">
                <tbody>
                <thead>
                    <tr>
                        <th>&nbsp;Data Heading</th>
                        <th>&nbsp;Data Supplied</th>
                    </tr>
                </thead>';
            $cartOrderProduction .= 
            '<tr><td>Location </td><td>' . Auth::User()->loc_name . '</td></tr>
            <tr><td>Order_Type_o </td><td>' . strip_tags($item_prod->name) . '</tr>
            <tr><td>Quantity_o </td><td>' . $item_prod->qty . '</tr>
            <tr><td>Name_o </td><td>' . $item_prod->options->name . '</tr>
            <tr><td>Title_o </td><td>' . $item_prod->options->title . '</tr>
            <tr><td>Email_o </td><td>' . $item_prod->options->email . '</tr>
            <tr><td>Phone_o </td><td>' . $item_prod->options->phone . '</tr>
            <tr><td>Fax_o </td><td>' . $item_prod->options->fax . '</tr>
            <tr><td>Cell_o </td><td>' . $item_prod->options->cell . '</tr>
            <tr><td>Address1_o </td><td>' . $item_prod->options->address1 . '</tr>
            <tr><td>Address2_o </td><td>' . $item_prod->options->address2 . '</tr>
            <tr><td>City_o </td><td>' . $item_prod->options->city. '</tr>
            <tr><td>State_o </td><td>' . $item_prod->options->state . '</tr>
            <tr><td>Zip_o </td><td>' . $item_prod->options->zip . '</tr>
            <tr><td>SP_Instructions_o </td><td>' . $item_prod->options->specialInstructions . '</tr>
            <tr><td>Admin Contact </td><td>' . Auth::User()->contact_a . '</tr>
            <tr><td>Shipping Contact </td><td>' . Auth::User()->contact_s . '</tr>
            <tr><td>Shipping Address </td><td>' . Auth::User()->address1_s . ' ' . Auth::User()->address2_s . ' ' . Auth::User()->city_s . ' ' . Auth::User()->state_s . ' ' . Auth::User()->zip_s . '</tr>
            <tr><td>Proof Image </td><td><a href="' . url(substr_replace($item->options->proofPath, 'pdf', -3)) . '">' . substr_replace($item->options->proofPath, 'pdf', -3) . '</a></tr></tbody>';
            $cartOrderProduction .= '</table><br>';
            }

        $cartOrderEmail = $cartOrderEmail . $cartOrder;


        \Mail::to(Auth::user()->email_a)->send(new OrderConfirmEmail($cartOrderEmail));
       
        // \Mail::to('support@arhorderportal.com')->send(new OrderProductionEmail($cartOrderProduction, $order));

        \Mail::to('azc99@me.com')->send(new OrderProductionEmail($cartOrderProduction, $order));

        Cart::destroy();

        return view('/cart/cartOrder', compact('request', 'order', 'cartOrder','cartOrderWeb', 'cartOrderProduction', 'confirmation')); 
        }  else {
        return redirect('/cart/cartConfirm')->withErrorMessage('Please confirm your data entry before placing your order.');
        }
    }
}
    

