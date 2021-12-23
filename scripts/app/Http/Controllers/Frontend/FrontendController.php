<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Logo;
use App\Models\About;
use App\Models\Category;
use App\Models\Slider;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $data['logo'] = Logo::first();
        $data['sliders'] = Slider::where('status',1)->get();;
        $data['contact'] = Contact::first();

        $data['categories'] = Product::select('category_id')->groupBy('category_id')->get();
        $data['brands'] = Product::select('brand_id')->groupBy('brand_id')->get();
        $data['products'] = Product::orderBy('id','desc')->get();
        // $data['products'] = Product::orderBy('id','desc')->paginate(6);
        return view('frontend.layouts.master.home',$data);
    }
    public function product_detail()
    {
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        return view('frontend.layouts.master.product-detail',$data);
    }

    public function shopping_cart()
    {
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        return view('frontend.layouts.master.shopping-cart',$data);
    }

    public function contact_us()
    {
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        return view('frontend.layouts.master.contact-us',$data);
    }
    public function about_us()
    {
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        $data['about'] = About::first();
        return view('frontend.layouts.master.about-us',$data);
    }

    public function product_list()
    {
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();

        $data['categories'] = Product::select('category_id')->groupBy('category_id')->get();
        $data['brands'] = Product::select('brand_id')->groupBy('brand_id')->get();
        $data['products'] = Product::orderBy('id','desc')->get();

        return view('frontend.layouts.master.product-list',$data);
    }

    public function categoryWiseProduct($category_id)
    {
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();

        $data['categories'] = Product::select('category_id')->groupBy('category_id')->get();
        $data['brands'] = Product::select('brand_id')->groupBy('brand_id')->get();

        $data['products'] = Product::where('category_id',$category_id)->orderBy('id','desc')->get();
        return view('frontend.layouts.master.category-wise-product',$data);
    }
    public function brandWiseProduct($brand_id)
    {
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();

        $data['categories'] = Product::select('category_id')->groupBy('category_id')->get();
        $data['brands'] = Product::select('brand_id')->groupBy('brand_id')->get();

        $data['products'] = Product::where('brand_id',$brand_id)->orderBy('id','desc')->get();
        return view('frontend.layouts.master.brand-wise-product',$data);
    }


}
