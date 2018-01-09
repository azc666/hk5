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

        if ($prod_layout == 'SBCFYI' || $prod_layout == 'ABCFYI' || $prod_layout == 'PBCFYI') {
            switch (Session::get('qty')) {
                case '24': $quantity = 24; break;
                case '28': $quantity = 28; break;
                case '54': $quantity = 54; break;
                case '58': $quantity = 58; break;
                default: $quantity = 24; 
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
                
        if ($request->qty > 0) {

            if ($prod_layout == 'SBC' || $prod_layout == 'ABC' || $prod_layout == 'PBC') {
                switch ($request->qty) {
                    case '100': $bcfyi_qty = '100 Business Cards'; break;
                    case '250': $bcfyi_qty = '250 Business Cards'; break;
                    case '500': $bcfyi_qty = '500 Business Cards'; break;
                    default: $bcfyi_qty = '250 Business Cards'; 
                }
            }
            if ($prod_layout == 'SBCFYI' || $prod_layout == 'ABCFYI' || $prod_layout == 'PBCFYI') {
                switch ($request->qty) {
                    case '24': $bcfyi_qty = '250 BCs + 4 FYI Pads'; break;
                    case '28': $bcfyi_qty = '250 BCs + 8 FYI Pads'; break;
                    case '54': $bcfyi_qty = '500 BCs + 4 FYI Pads'; break;
                    case '58': $bcfyi_qty = '500 BCs + 8 FYI Pads'; break;
                    default: $bcfyi_qty = '250 BCs + 4 FYI Pads'; 
                }
            } 
            if ($prod_layout == 'SFYI' || $prod_layout == 'AFYI' || $prod_layout == 'PFYI') {
                switch ($request->qty) {
                    case '4': $bcfyi_qty = '4 FYI Pads'; break;
                    case '8': $bcfyi_qty = '8 FYI Pads'; break;
                    default: $bcfyi_qty = '4 FYI Pads'; 
                }
            }

// dd($request->qty);
          Cart::update($request->rowId, ['qty' => $request->qty]);
 
            if ($_SERVER['HTTP_REFERER'] == 'http://hk5.test/cart/cartConfirm') {
                return redirect('cart/cartConfirm')->withSuccessMessage('The quantity has been updated to ' . $bcfyi_qty . '.');
            } else {
                return redirect('cart/')->withSuccessMessage('The quantity has been updated to ' . $bcfyi_qty . '.');
            }
        } else {
            if ($_SERVER['HTTP_REFERER'] == 'http://hk5.test/cart/cartConfirm') {
                return redirect('cart/cartConfirm')->withErrorMessage('The quantity remained unchanged'); 
            } else {
                return redirect('cart/')->withErrorMessage('The quantity remained unchanged');
            }
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
