<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use \Cart as Cart;
use Validator;
use App\Product;
use App\Shoppingcart;
use PDF;
use Imagick;
use Illuminate\Support\Facades\Storage;
use Auth;
use File;
use ImagickPixel;
use ImageMagick;
use Session;
use DisplayName;
use Carbon\Carbon;


class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd('hola');
        return view('cart');
    }

    public function show(Request $request, Product $product)
    {
        //dd('hola');
        return view('cart/cartConfirm');
    }

    public function store(Request $request, Product $product)
    {
         $duplicates = Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id === $request->id;
        });

        // if (!$duplicates->isEmpty()) {
        //     return redirect('cart')->withInput()->withSuccessMessage('Item is already in your cart!');
        // }

        
        if (file_exists('assets/mpdf/temp/' . Auth::user()->username  . '/showData.jpg')) {

        $emailuser = explode("@", Session::get('email'));
        $emailuser = $emailuser[0];
        $filePath = 'assets/mpdf/temp/' . Auth::user()->username  . '/showData.jpg';
        $proofFilePathDir = 'assets/proofs/' . Auth::user()->username  . '/';
        $proofFilePath = 'assets/proofs/' . Auth::user()->username  . '/' . Session::get('prod_layout') . '-' . DisplayName::initials(Session::get('card_name')) . '-' . $emailuser . '-' . Carbon::now('America/New_York')->format('m-d-y-gis') . '-proof.jpg';
        $proofFilePathPdf = 'assets/proofs/' . Auth::user()->username  . '/' . Session::get('prod_layout') . '-' . DisplayName::initials(Session::get('card_name')) . '-' . $emailuser . '-' . Carbon::now('America/New_York')->format('m-d-y-gis') . '-proof.pdf';
        
        //dd($proofFilePath);
        
        if (file_exists('assets/proofs/' . Auth::user()->username . '/')) {
            $proofFilePath = 'assets/proofs/' . Auth::user()->username  . '/' . Session::get('prod_layout') . '-' . DisplayName::initials(Session::get('name')) . '-' . $emailuser . '-' . Carbon::now('America/New_York')->format('m-d-y-gis') . '-proof.jpg';
            $proofFilePathPdf = 'assets/proofs/' . Auth::user()->username  . '/' . Session::get('prod_layout') . '-' . DisplayName::initials(Session::get('name')) . '-' . $emailuser . '-' . Carbon::now('America/New_York')->format('m-d-y-gis') . '-proof.pdf';
        } else {
            File::makeDirectory($proofFilePathDir);
            $proofFilePath = 'assets/proofs/' . Auth::user()->username  . '/' . Session::get('prod_layout') . '-' . DisplayName::initials(Session::get('name')) . '-' . $emailuser . '-' . Carbon::now('America/New_York')->format('m-d-y-gis') . '-proof.jpg';
            $proofFilePathPdf = 'assets/proofs/' . Auth::user()->username  . '/' . Session::get('prod_layout') . '-' . DisplayName::initials(Session::get('name')) . '-' . $emailuser . '-' . Carbon::now('America/New_York')->format('m-d-y-gis') . '-proof.pdf';
        }
        
            $im = new \Imagick($filePath);
            $imp = new \Imagick($filePath);
            $im->setImageFormat('jpg');
            $imp->setImageFormat('pdf');
            file_put_contents($proofFilePath, $im);
            file_put_contents($proofFilePathPdf, $imp);

        $prod_layout = Session::get('prod_layout');


        if ($prod_layout == 'SBC' || $prod_layout == 'ABC' || $prod_layout == 'PBC') {
 // dd(Session::get('prod_layout'));
            switch (Session::get('qty')) {
                case '100': $quantity = 100; break;
                case '250': $quantity = 250; break;
                case '500': $quantity = 500; break;
                case '1000': $quantity = 1000; break;
                default: $quantity = 250;
            }
        }

        if ($prod_layout == 'SFYI' || $prod_layout == 'AFYI' || $prod_layout == 'PFYI') {
            switch (Session::get('qty')) {
                case '4': $quantity = 4; break;
                case '8': $quantity = 8; break;
                default: $quantity = 4; 
            }
        }

        $price = 0;
            Cart::add($request->id, $request->name, $quantity, $price, [
                'proofPath' => $proofFilePath,
                'name' => Session::get('name'),
                'title' => Session::get('title'),
                'email' => Session::get('email'),
                'community' => Session::get('community'),
                'address1' => Session::get('address1'),
                'address2' => Session::get('address2'),
                'city' => Session::get('city'),
                'state' => Session::get('state'),
                'zip' => Session::get('zip'),
                'phone' => Session::get('phone'),
                'fax' => Session::get('fax'),
                'cell' => Session::get('cell'),
                'license' => Session::get('license'),
                'specialInstructions' => Session::get('specialInstructions'),
                'prod_name' => strip_tags(Session::get('prod_name')),
                'prod_layout' => Session::get('prod_layout'),
                'prod_id' => $request->id,
                'prod_description' => Session::get('prod_description'),
                'imagePath' => Session::get('imagePath'),
                ])->associate('App\Product');
            //dd(Session::get('prod_description'));

            Session::put('proofFilePath', $proofFilePath);
            Session::put('opb_imagepath', $product->imagepath);
            // dd(Session::get('prod_description'));
            $product = Product::all();
            // dd($product->get('prod_layout')->first());
            return redirect('/cart')->withSuccessMessage(strip_tags($request->name) . ' was added to your cart!');  
    
    } 
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $prod_layout = $request->prod_layout;
        if ($prod_layout == 'fbc' || $prod_layout == 'fbc6' || $prod_layout == 'srbc' || $prod_layout == 'srbc6' || $prod_layout == 'cbc' || $prod_layout == 'cbc6' || $prod_layout == 'dsbc' || $prod_layout == 'dsbc6' || $prod_layout == 'arhsbc') {
            switch ($request->qty) {
                case '100': $quantity = 100; $price = .5224; break; // $52.24
                case '250': $quantity = 250; $price = .27524; break; // $68.81
                case '500': $quantity = 500; $price = .15492; break; // $77.46
                case '1000': $quantity = 1000; $price = .09279; break; // $92.79
                default: $quantity = 01; $price = .00; // 12/4/17   
            }
        }
//dd($quantity);
        if ($prod_layout == 'psrbc' || $prod_layout == 'psrbc6') {
            switch ($request->qty) {
                case '100': $quantity = 100; $price = .9484; break; // $94.84
                case '250': $quantity = 250; $price = .39664; break; // $99.16
                case '500': $quantity = 500; $price = .21626; break; // $108.13
                case '1000': $quantity = 1000; $price = .12412; break; // $124.12
                default: $quantity = 500; $price = .21626; // 12/4/17  
            }
        }

        if ($prod_layout == 'lbl' || $prod_layout == 'lbl6' || $prod_layout == 'clbl' || $prod_layout == 'clbl6' || $prod_layout == 'dslbl' || $prod_layout == 'dslbl6' || $prod_layout == 'arhslbl') {
            switch ($request->qty) {
                case '100': $quantity = 100; $price = .7194; break; // $71.94
                case '250': $quantity = 250; $price = .345; break; // $86.25
                case '500': $quantity = 500; $price = .2242; break; // $112.10
                case '1000': $quantity = 1000; $price = .1613; break; // $161.30
                default: $quantity = 01; $price = .00;  // 12/2/17 
            }
        }
        
        if ($prod_layout == 'cnp' || $prod_layout == 'cnp6' || $prod_layout == 'np' || $prod_layout == 'np6' || $prod_layout == 'dsnp' || $prod_layout == 'dsnp6' || $prod_layout == 'arhsnp') {
            switch ($request->qty) {
                case '4': $quantity = 4; $price = 17.3475; break; // $69.39
                case '8': $quantity = 8; $price = 10.20375; break; // $81.63
                default: $quantity = 4; $price = 17.35; // 12/4/17
            }
        }

         if ($prod_layout == 'lh' || $prod_layout == 'lh6' || $prod_layout == 'dslh' || $prod_layout == 'dslh6' || $prod_layout == 'clh' || $prod_layout == 'clh6' || $prod_layout == 'arhslh') { // Letterhead
            switch ($request->qty) {
                case '100': $quantity = 100; $price = .618; break; // $61.80
                case '250': $quantity = 250; $price = .36348; break; // $90.87
                case '500': $quantity = 500; $price = .2492; break; // $124.60
                case '1000': $quantity = 1000; $price = .19205; break; // $192.05
                default: $quantity = 500; $price = .2492; // 12/4/17   
            }
        }

        if ($prod_layout == 'env' || $prod_layout == 'env6' || $prod_layout == 'cenv' || $prod_layout == 'cenv6' || $prod_layout == 'dsenv' || $prod_layout == 'dsenv6' || $prod_layout == 'arhsenv') {
            switch ($request->qty) {
                case '100': $quantity = 100; $price = .7642; break; // $76.42
                case '250': $quantity = 250; $price = .5305; break; // $132.63
                case '500': $quantity = 500; $price = .41622; break; // $208.11
                case '1000': $quantity = 1000; $price = .35908; break; // $359.08
                default: $quantity = 500; $price = .41622; // 12/6/17   
            }
        }

        if ($prod_layout == 'opbcl' || $prod_layout == 'opbco' || $prod_layout == 'opbmo' || $prod_layout == 'opbsu') { // Process Brochure
            switch ($request->qty) {
                case '100': $quantity = 100; $price = 2.0462; break; // $204.62
                case '250': $quantity = 250; $price = 1.4962; break; // $374.05
                case '500': $quantity = 500; $price = 1.19618; break; // $598.09
                // case '1000': $quantity = 1000; $price = .135; break; // $135
                default: $quantity = 250; $price = 1.4962; // 12/4/17   
            }
        }
                
        if ($request->qty > 0) {
            //dd($request->title);
          Cart::update($request->rowId, ['qty' => $request->qty]);
            //dd(Cart::get($request->rowId)->options->title);
            //Cart::update($request->rowId, ['title' => 'testtitle']);
            //Session::put('rowId', '');
            return redirect('cart')->withSuccessMessage('The quantity has been updated to ' . $request->qty . '.');  
        } else {
            return redirect('cart')->withErrorMessage('The quantity remained unchanged');  
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Cart::remove($id);
        return redirect('cart')->withSuccessMessage('The item has been removed!');
    }

    public function emptyCart()
    {
        Cart::destroy();
        return redirect('cart')->withSuccessMessage('Your cart has been cleared!');
    }
}
