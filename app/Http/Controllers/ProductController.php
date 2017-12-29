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
            // mkdir('assets/mpdf/temp/' . Auth::user()->username);
            $pathToPdf = 'assets/mpdf/temp/' . Auth::user()->username  . '/showData.pdf';
            $pathToWhereJpgShouldBeStored = 'assets/mpdf/temp/' . Auth::user()->username  . '/showData.jpg';
        }

///////////////////////// Business Cards ////////////////////////        
        if ($request->prod_id == 101 || $request->prod_id == 102 || $request->prod_id == 103) {
            $pdf = PDF::loadView('products.showEdit', $data, compact('product', 'category', 'request', 'numb', 'numbfax', 'numbcell', 'phone', 'phoneValidation'), [
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

/////////////////////// FYI Pads ///////////////////////        
        if ($request->prod_id == 107 || $request->prod_id == 108 || $request->prod_id == 109) { 
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

        File::delete($pathToWhereJpgShouldBeStored);
        File::delete($pathToPdf);
        
        $pdf->save($pathToPdf);

        $im = new \Imagick($pathToPdf);
        $im->setImageFormat('jpg');

        file_put_contents($pathToWhereJpgShouldBeStored, $im);

        // $titles = Title::pluck('title', 'title');

        if ($request->prod_id == 101 || $request->prod_id == 104 || $request->prod_id == 107) {
            $titles = Title::where('type', 'S')->orderBy('title')->pluck('title', 'title');
        }
        if ($request->prod_id == 102 || $request->prod_id == 105 || $request->prod_id == 108) {
            $titles = Title::where('type', 'A')->orderBy('title')->pluck('title', 'title');
        }
        if ($request->prod_id == 103 || $request->prod_id == 106 || $request->prod_id == 109) {
            $titles = Title::where('type', 'P')->orderBy('title')->pluck('title', 'title');
        }

        return view('products.edit', compact('product', 'category', 'request', 'numb', 'numbfax', 'numbcell', 'phone', 'titles'));

    }
}
