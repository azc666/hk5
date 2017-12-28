<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Title;
use App\Phone;
use Session;
use PDF;
use Imagick;
use Illuminate\Support\Facades\Storage;
use Auth;
use File;
use ImagickPixel;
use ImageMagick;
use \Cart as Cart;
use App\Classes\LayoutHelpersClass;
// use Spatie\PdfToImage\Pdf;

class ProductController extends Controller
{
    public function show(Request $request, Product $product, Category $category)
    {
        Session::put('prodId', $product->id);
        
        if ($product->id == 101 || $product->id == 104 || $product->id == 107) {
            $titles = Title::where('type', 'S')->orderBy('title')->pluck('title', 'title');
        }
        if ($product->id == 102 || $product->id == 105 || $product->id == 108) {
            $titles = Title::where('type', 'A')->orderBy('title')->pluck('title', 'title');
        }
        if ($product->id == 103 || $product->id == 106 || $product->id == 109) {
            $titles = Title::where('type', 'P')->orderBy('title')->pluck('title', 'title');
        }
        return view('products.show', [$product->id], compact('product', 'category', 'request', 'titles'));
    }

    public function index(Product $products)
    {
        // $category = $products->categories()->orderBy('created_at', 'desc')->paginate(2);
         //$category = Category::all();
//         $articles = Article::with('users')->all();
         //$products = Product::all();
         //$product = Product::orderBy('prod_name', 'desc');

         //$filePath = 'assets/mpdf/temp/showData.jpg';

         //Storage::disk('public')->put('"mpdf/temp/" . {Auth::user->username} . "/showData.jpg"', $filePath);
         //Storage::disk('public')->delete('showData.jpg');
         //$exists = Storage::disk('public')->exists('showData.jpg');
         //echo $exists;

        return view('products.index', compact('category', 'products'));
    }

    public function showData(Request $request, Product $product)
    {   
        if ($request->id == 101 || $request->id == 104 || $request->id == 107) {
            $titles = Title::where('type', 'S')->orderBy('title')->pluck('title', 'title');
        }
        if ($request->id == 102 || $request->id == 105 || $request->id == 108) {
            $titles = Title::where('type', 'A')->orderBy('title')->pluck('title', 'title');
        }
        if ($request->id == 103 || $request->id == 106 || $request->id == 109) {
            $titles = Title::where('type', 'P')->orderBy('title')->pluck('title', 'title');
        }

        $numb = $request->phone;
        $numbfax = $request->fax;
        $numbcell = $request->cell;

        $phone = '';
        if (($request->phone) && ($request->fax || $request->cell)) {
            $phone .= 'T ' . Phone::phoneNumber($numb) . ' | ';             
        } elseif (empty($request->fax) && empty($request->cell)) {
            $phone .= 'T ' . Phone::phoneNumber($numb);
        }

        if ($request->cell) {
            $phone .= 'M ' .  Phone::phoneNumber($numbcell);
        }

        if (($request->cell) && ($request->fax)) {
            $phone .= ' | F ' . Phone::phoneNumber($numbfax);
        } elseif ($request->fax && ($request->phone)) {
            $phone .= 'F ' . Phone::phoneNumber($numbfax);
        } elseif ($request->fax) {
            $phone .= 'F ' . Phone::phoneNumber($numbfax);
        }

        if ((!$request->phone) && (!$request->fax && !$request->cell)) {
            $phone = null; 
        } 

        $request->merge(['phone' => Phone::phoneNumber($numb)]); 
        $request->merge(['fax' => Phone::phoneNumber($numbfax)]);
        $request->merge(['cell' => Phone::phoneNumber($numbcell)]); 

        $data = [];

        if (file_exists('assets/mpdf/temp/' . Auth::user()->username)) {
            $pathToPdf = 'assets/mpdf/temp/' . Auth::user()->username  . '/showData.pdf';
            $pathToWhereJpgShouldBeStored = 'assets/mpdf/temp/' . Auth::user()->username  . '/showData.jpg';
        } else {
            mkdir('assets/mpdf/temp/' . Auth::user()->username);
            $pathToPdf = 'assets/mpdf/temp/' . Auth::user()->username  . '/showData.pdf';
            $pathToWhereJpgShouldBeStored = 'assets/mpdf/temp/' . Auth::user()->username  . '/showData.jpg';
        }
        
///////////////////// Business Cards ///////////////////////
        if ($request->id == 101 || $request->id == 102 || $request->id == 103) {
            $pdf = PDF::loadView('products.showData', $data, compact('product', 'category', 'request', 'numb', 'numbfax', 'numbcell', 'phone', 'phoneValidation'), [
                'mode'                 => '',
                'format'               => array(266, 152.4),    // jpg dimensions (665x381) / 2.5
                'default_font_size'    => '12',
                'default_font'         => 'sans-serif',
                'margin_left'          => 0,
                'margin_right'         => 0,
                'margin_top'           => 0,
                'margin_bottom'        => 0,
                'margin_header'        => 0,
                'margin_footer'        => 0,
                'orientation'          => 'P',
                'title'                => 'Laravel mPDF',
                'author'               => '',
                'watermark'            => 'PROOF',
                'show_watermark'       => true,
                'watermark_font'       => 'sans-serif',
                'display_mode'         => 'fullpage',
                'watermark_text_alpha' => 0.075,
            ]);
        }

////////////////////// FYI Pads //////////////////////
        if ($request->id == 107 || $request->id == 108 || $request->id == 109) { 
            $pdf = PDF::loadView('products.showData', $data, compact('product', 'category', 'request', 'numb', 'numbfax', 'numbcell', 'phone'), [
                'mode'                 => '',
                'format'               => array(405.2, 517.6),
                // 'format'               => array(405.2, 258.8),
                'default_font_size'    => '12',
                'default_font'         => 'sans-serif',
                'margin_left'          => 0,
                'margin_right'         => 0,
                'margin_top'           => 0,
                'margin_bottom'        => 0,
                'margin_header'        => 0,
                'margin_footer'        => 0,
                'orientation'          => 'P',
                'title'                => 'Laravel mPDF',
                'author'               => '',
                'watermark'            => 'PROOF',
                'show_watermark'       => true,
                'watermark_font'       => 'sans-serif',
                'display_mode'         => 'fullpage',
                'watermark_text_alpha' => 0.075,
            ]);
        }

        File::delete($pathToWhereJpgShouldBeStored);
        File::delete($pathToPdf);

        $pdf->save($pathToPdf);

        $im = new \Imagick($pathToPdf);
        $im->setImageFormat('jpg');

        file_put_contents($pathToWhereJpgShouldBeStored, $im);

        Session::put('prod_description', strip_tags($request->prod_description));
        Session::put('address2', $request->address2);
        // Session::put('qty', $request->qty);

        // $titles = Title::pluck('id', 'type', 'title');
        return back()->withInput();

    }

    public function showEdit(Request $request, Product $product)
    {   
        $numb = $request->phone;
        $numbfax = $request->fax;
        $numbcell = $request->cell;

        $phone = '';
        if (($request->phone) && ($request->fax || $request->cell)) {
            if ($request->prod_id == 39 || $request->prod_id == 40 || $request->prod_id == 41 || $request->prod_id == 42 || $request->prod_id == 43) {
                $phone .= Phone::phoneNumber($numb) . ' &#124; ';
            } else {
                $phone .= Phone::phoneNumber($numb) . ' &#8226; ';
            }              
        }
        elseif (empty($request->fax) && empty($request->cell)) {
            $phone .= Phone::phoneNumber($numb);
        }  
        if ($request->fax) {
            $phone .= 'Fax ' .  Phone::phoneNumber($numbfax);
        } 
        if (($request->cell) && ($request->fax)) {
            if ($request->prod_id == 39 || $request->prod_id == 40 || $request->prod_id == 41 || $request->prod_id == 42 || $request->prod_id == 43) {
                $phone .= ' &#124; Cell ' . Phone::phoneNumber($numbcell);
            } else {
                $phone .= ' &#8226; Cell ' . Phone::phoneNumber($numbcell);
            }
        }
        elseif ($request->cell && ($request->phone)) {
            $phone .= 'Cell ' . Phone::phoneNumber($numbcell);
        }
        elseif ($request->cell) {
            $phone .= 'Cell ' . Phone::phoneNumber($numbcell);
        }
        $request->merge(['phone' => Phone::phoneNumber($numb)]); 
        $request->merge(['fax' => Phone::phoneNumber($numbfax)]);
        $request->merge(['cell' => Phone::phoneNumber($numbcell)]);

        $data = [];

        if (file_exists('assets/mpdf/temp/' . Auth::user()->username)) {
            $pathToPdf = 'assets/mpdf/temp/' . Auth::user()->username  . '/showData.pdf';
            $pathToWhereJpgShouldBeStored = 'assets/mpdf/temp/' . Auth::user()->username  . '/showData.jpg';
        } else {
            // mkdir('assets/mpdf/temp/' . Auth::user()->username);
            $pathToPdf = 'assets/mpdf/temp/' . Auth::user()->username  . '/showData.pdf';
            $pathToWhereJpgShouldBeStored = 'assets/mpdf/temp/' . Auth::user()->username  . '/showData.jpg';
        }

///////////////////////// Business Cards ////////////////////////        
        if ($request->prod_id == 1 || $request->prod_id == 2 || $request->prod_id == 3 || $request->prod_id == 4 || $request->prod_id == 10 || $request->prod_id == 11 || $request->prod_id == 12 || $request->prod_id == 13 || $request->prod_id == 7 || $request->prod_id == 16 || $request->prod_id == 27 || $request->prod_id == 28 || $request->prod_id == 29 || $request->prod_id == 30 || $request->prod_id == 31 || $request->prod_id == 32 || $request->prod_id == 39 || $request->prod_id == 40) { 

            $pdf = PDF::loadView('products.showEdit', $data, compact('product', 'category', 'request', 'numb', 'numbfax', 'numbcell', 'phone'), [
                'mode'                 => '',
                'format'               => array(266, 152.4),    // jpg dimensions (665x381) / 2.5
                'default_font_size'    => '12',
                'default_font'         => 'sans-serif',
                'margin_left'          => 0,
                'margin_right'         => 0,
                'margin_top'           => 0,
                'margin_bottom'        => 0,
                'margin_header'        => 0,
                'margin_footer'        => 0,
                'orientation'          => 'P',
                'title'                => 'Laravel mPDF',
                'author'               => '',
                'watermark'            => 'PROOF',
                'show_watermark'       => true,
                'watermark_font'       => 'sans-serif',
                'display_mode'         => 'fullpage',
                'watermark_text_alpha' => 0.075,
            ]);
        }

//////////////////////////// Note Pads /////////////////////////////        
        if ($request->prod_id == 19 || $request->prod_id == 20 || $request->prod_id == 21 || $request->prod_id == 22 || $request->prod_id == 33 || $request->prod_id == 34 || $request->prod_id == 41) { 
            $pdf = PDF::loadView('products.showEdit', $data, compact('product', 'category', 'request', 'numb', 'numbfax', 'numbcell', 'phone'), [
                'mode'                 => '',
                'format'               => array(405.2, 517.6),
                'default_font_size'    => '12',
                'default_font'         => 'sans-serif',
                'margin_left'          => 0,
                'margin_right'         => 0,
                'margin_top'           => 0,
                'margin_bottom'        => 0,
                'margin_header'        => 0,
                'margin_footer'        => 0,
                'orientation'          => 'P',
                'title'                => 'Laravel mPDF',
                'author'               => '',
                'watermark'            => 'PROOF',
                'show_watermark'       => true,
                'watermark_font'       => 'sans-serif',
                'display_mode'         => 'fullpage',
                'watermark_text_alpha' => 0.075,
            ]);
        }
        
///////////////////////// Letterhead ////////////////////////////////         
        if ($request->prod_id == 8 || $request->prod_id == 17 || $request->prod_id == 5 || $request->prod_id == 14 || $request->prod_id == 37 || $request->prod_id == 38 || $request->prod_id == 43) {  
            $pdf = PDF::loadView('products.showEdit', $data, compact('product', 'category', 'request', 'numb', 'numbfax', 'numbcell', 'phone'), [
                'mode'                 => '',
                'format'               => array(392,517.6),
                'default_font_size'    => '12',
                'default_font'         => 'sans-serif',
                'margin_left'          => 0,
                'margin_right'         => 0,
                'margin_top'           => 0,
                'margin_bottom'        => 0,
                'margin_header'        => 0,
                'margin_footer'        => 0,
                'orientation'          => 'P',
                'title'                => 'Laravel mPDF',
                'author'               => '',
                'watermark'            => 'PROOF',
                'show_watermark'       => true,
                'watermark_font'       => 'sans-serif',
                'display_mode'         => 'fullpage',
                'watermark_text_alpha' => 0.075,
            ]);
        }

/////////////////////////// Envelope /////////////////////////         
        if ($request->prod_id == 9 || $request->prod_id == 18 || $request->prod_id == 6 || $request->prod_id == 15 || $request->prod_id == 35 || $request->prod_id == 36 || $request->prod_id == 42) { 
            $pdf = PDF::loadView('products.showEdit', $data, compact('product', 'category', 'request', 'numb', 'numbfax', 'numbcell', 'phone'), [
                'mode'                 => '',
                'format'               => array(392, 170.4),
                'default_font_size'    => '12',
                'default_font'         => 'sans-serif',
                'margin_left'          => 0,
                'margin_right'         => 0,
                'margin_top'           => 0,
                'margin_bottom'        => 0,
                'margin_header'        => 0,
                'margin_footer'        => 0,
                'orientation'          => 'P',
                'title'                => 'Laravel mPDF',
                'author'               => '',
                'watermark'            => 'PROOF',
                'show_watermark'       => true,
                'watermark_font'       => 'sans-serif',
                'display_mode'         => 'fullpage',
                'watermark_text_alpha' => 0.075,
            ]);
        }

////////////////////// Our Process Brochures /////////////////////        
        if ($request->prod_id == 23 || $request->prod_id == 24 || $request->prod_id == 25 || $request->prod_id == 26) {  
            $pdf = PDF::loadView('products.showEdit', $data, compact('product', 'category', 'request', 'numb', 'numbfax', 'numbcell', 'phone'), [
                'mode'                 => '',
                'format'               => array(392, 1035.2),
                'default_font_size'    => '24',
                'default_font'         => 'sans-serif',
                'margin_left'          => 0,
                'margin_right'         => 0,
                'margin_top'           => 0,
                'margin_bottom'        => 0,
                'margin_header'        => 0,
                'margin_footer'        => 0,
                'orientation'          => 'P',
                'title'                => 'Laravel mPDF',
                'author'               => '',
                'watermark'            => 'PROOF',
                'show_watermark'       => true,
                'watermark_font'       => 'sans-serif',
                'display_mode'         => 'fullpage',
                'watermark_text_alpha' => 0.075,
            ]);
        }

        File::delete($pathToWhereJpgShouldBeStored);
        File::delete($pathToPdf);
        $pdf->save($pathToPdf);

        $im = new \Imagick($pathToPdf);
        $im->setImageFormat('jpg');

        file_put_contents($pathToWhereJpgShouldBeStored, $im);

        $titles = Title::pluck('id', 'type', 'title');

        return view('products.edit', compact('product', 'category', 'request', 'numb', 'numbfax', 'numbcell', 'phone', 'titles'));

    }
}
