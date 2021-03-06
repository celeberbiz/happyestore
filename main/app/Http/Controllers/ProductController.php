<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use App\Product;
use App\CategoryProduct;
use App\AlbumPhoto;
use App\Section;
use App\Cart;
use App\Option;
use App\OptionValue;
use File;
use Auth;
use App;
use Session;
use \Illuminate\Database\Eloquent\Collection;
use \Ecommerce\helperFunctions;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin', ['except' => [
            'index',
            'show',
            'search'
        ]]);
    }

    public function index()
    {
        $new_products = Product::orderBy('created_at', 'desc')->take(12)->get();
        $get_best_sellers = App\OrderProduct::select('product_id', \DB::raw('COUNT(product_id) as count'))->groupBy('product_id')->orderBy('count', 'desc')->take(8)->get();
        $best_sellers = [];
        foreach ($get_best_sellers as $product) {
            $best_sellers[] = $product->product;
        }
        helperFunctions::getPageInfo($sections,$cart,$total);
        return view('site.index', compact('new_products', 'best_sellers', 'sections', 'cart', 'total'));
    }

    public function show($id)
    {
        $product = Product::find($id);

        $product_categories = $product->categories()->lists('id')->toArray();
        
        $similair = Category::find($product_categories[array_rand($product_categories)])->products()->whereNotIn('id', array($id))->orderByRaw("RAND()")->take(6)->get();
        helperFunctions::getPageInfo($sections,$cart,$total);
        return view('site.product', compact('sections', 'product', 'similair', 'cart', 'total'));
    }

    public function store(Request $request)
    {
        /**
    	 * Validate the submitted Data
    	 */
        $this->validate($request, [
            'name' => 'required',
            'manufacturer' => 'required',
            'price' => 'required',
            'details' => 'required',
            'quantity' => 'required',
            'categories' => 'required',
            'thumbnail' => 'required|image',
        ]);
        if ($request->hasFile('album')) {
            foreach ($request->album as $photo) {
                if ($photo && strpos($photo->getMimeType(), 'image') === false) {
                    return \Redirect()->back();
                }
            }
        }

        /**
    	 * Upload a new thumbnail
    	 */
        $dest = "content/images/";
        $name = str_random(11)."_".$request->file('thumbnail')->getClientOriginalName();
        $request->file('thumbnail')->move($dest, $name);
        $product = $request->all();
        $product['thumbnail'] = "/".$dest.$name;
        
        $product = Product::create($product);

        /**
         * Upload Album Photos
         */
        if ($request->hasFile('album')) {
            foreach ($request->album as $photo) {
                if ($photo) {
                    $name = str_random(11)."_".$photo->getClientOriginalName();
                    $photo->move($dest, $name);
                    AlbumPhoto::create([
                        'product_id' => $product->id,
                        'photo_src' => "/".$dest.$name
                    ]);
                }
            }
        }


        /**
    	 * Linking the categories to the product
    	 */
        
        foreach ($request->categories as $category_id) {
            CategoryProduct::create(['category_id' => $category_id, 'product_id' => $product->id]);
        }

        /**
         * Linking the options to the product
         */
        
        if ($request->has('options')){
            foreach ($request->options as $option_details) {
                if (!empty($option_details['name']) && !empty($option_details['values'][0]) ) {
                    $option = Option::create([
                        'name' => $option_details['name'],
                        'product_id' => $product->id
                    ]);
                    foreach ($option_details['values'] as $value) {
                        OptionValue::create([
                            'value' => $value,
                            'option_id' => $option->id
                        ]);
                    }
                }
            }
        }
        
        return \Redirect('/admin/products')->with([
            'flash_message' => 'Product Created Successfully'
        ]);
    }

    public function edit(Request $request, $id)
    {
        $product = Product::find($id);
        /**
    	 * Validate the submitted Data
    	 */
        $this->validate($request, [
            'name' => 'required',
            'manufacturer' => 'required',
            'price' => 'required',
            'details' => 'required',
            'quantity' => 'required',
            'categories' => 'required',
            'thumbnail' => 'image',
        ]);
        if ($request->hasFile('album')) {
            foreach ($request->album as $photo) {
                if ($photo && strpos($photo->getMimeType(), 'image') === false) {
                    return \Redirect()->back();
                }
            }
        }

        /**
    	 * Remove the old categories from the pivot table and maintain the reused ones 
    	 */
        $added_categories = [];
        foreach ($product->categories as $category) {
            if (!in_array($category->id, $request->categories)) {
                CategoryProduct::whereProduct_id($product->id)->whereCategory_id($category->id)->delete();
            } else {
                $added_categories[] = $category->id;
            }
        }

        /**
    	 * Link the new categories to the pivot table
    	 */
        foreach ($request->categories as $category_id) {
            if (!in_array($category_id, $added_categories)) {
                CategoryProduct::create(['category_id' => $category_id, 'product_id' => $product->id]);
            }
        }
        
        $info = $request->all();
        
        /**
    	 * Upload a new thumbnail and delete the old one
    	 */
        $dest = "content/images/";
        if ($request->file('thumbnail')) {
            File::delete(public_path().$product->thumbnail);
            $name = str_random(11)."_".$request->file('thumbnail')->getClientOriginalName();
            $request->file('thumbnail')->move($dest, $name);
            $info['thumbnail'] = "/".$dest.$name;
        }
        /**
         * Upload Album Photos
         */
        if ($request->hasFile('album')) {
            foreach ($request->album as $photo) {
                if ($photo) {
                    $name = str_random(11)."_".$photo->getClientOriginalName();
                    $photo->move($dest, $name);
                    AlbumPhoto::create([
                        'product_id' => $product->id,
                        'photo_src' => "/".$dest.$name
                    ]);
                }
            }
        }

        $product->update($info);

        /**
         * Linking the options to the product
         */
        
        if ($request->has('options')){
            foreach ($request->options as $option_details) {
                if (!empty($option_details['name']) && !empty($option_details['values']['name'][0]) ) {
                    if (isset($option_details['id'])) 
                    {
                        $size = count($option_details['values']['id']);
                        Option::find($option_details['id'])->update(['name' => $option_details['name']]);
                        foreach ($option_details['values']['name'] as $key => $value) {
                            if ($key < $size) 
                            {
                                OptionValue::find($option_details['values']['id'][$key])->update(['value' => $value]);
                            }
                            else
                            {
                                OptionValue::create([
                                    'value' => $value,
                                    'option_id' => $option_details['id']
                                ]);
                            }
                        }
                    }
                    else
                    {
                        $option = Option::create([
                            'name' => $option_details['name'],
                            'product_id' => $product->id
                        ]);
                        foreach ($option_details['values']['name'] as $value) {
                            if (!empty($value)) {
                                OptionValue::create([
                                    'value' => $value,
                                    'option_id' => $option->id
                                ]);
                            }
                        }
                    }
                }
            }
        }
        return \Redirect()->back()->with([
            'flash_message' => 'Product Successfully Modified'
        ]);
    }

    public function delete($id)
    {
        $product = Product::find($id);
        File::delete(base_path()."/..".$product->thumbnail);
        foreach ($product->photos as $photo) {
            File::delete(base_path()."/..".$photo->photo_src);
        }
        CategoryProduct::whereProduct_id($id)->delete();
        $product->delete();
        return \Redirect::back();
    }

    public function deletePhoto($id, $photo_id)
    {
        $photo = AlbumPhoto::find($photo_id);
        File::delete(base_path()."/..".$photo->photo_src);
        AlbumPhoto::destroy($photo_id);
        return \Redirect()->back();
    }

    public function deleteOption($id)
    {
        Option::destroy($id);
        return \Redirect()->back();
    }  

    public function deleteOptionValue($id)
    {
        OptionValue::destroy($id);
        return \Redirect()->back();
    }

    public function search(Request $request)
    {
        if (strtoupper($request->sort) == 'NEWEST') {
            $products = Product::where('name', 'like', '%'.$request->q.'%')->orderBy('created_at', 'desc')->paginate(40);
        } elseif (strtoupper($request->sort) == 'HIGHEST') {
            $products = Product::where('name', 'like', '%'.$request->q.'%')->orderBy('price', 'desc')->paginate(40);
        } elseif (strtoupper($request->sort) == 'LOWEST') {
            $products = Product::where('name', 'like', '%'.$request->q.'%')->orderBy('price', 'asc')->paginate(40);
        } else {
            $products = Product::where('name', 'like', '%'.$request->q.'%')->paginate(40);
        }
        helperFunctions::getPageInfo($sections,$cart,$total);
        $query = $request->q;
        return view('site.search', compact('sections', 'cart', 'total', 'products', 'query'));
    }
}
