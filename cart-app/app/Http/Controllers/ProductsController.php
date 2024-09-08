<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use Session;

class ProductsController extends Controller
{
    public function index(){
        $products = Products::latest()->paginate(4);
        return view('products.index',compact('products'));
    }

    public function addProduct(){
        return view('products.createProduct');
    }

    public function store(Request $request){
        $path = 'products/storedImage/';
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'mrp'=>'required|numeric',
            'sp'=>'required|numeric',
            'image'=>'required|mimes:jpg,jpeg,png,gif|max:10000',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move($path,$imageName);

        $product = new Products;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->mrp = $request->mrp;
        $product->sprice = $request->sp;
        $product->image = $imageName;
        $product->save();
        Session::flash('msg','Product Added Successfully!');
        return back();
    }

    public function editProduct(Request $request){
        $id = $request['id'];
        $product = Products::find($id);
        return view('products.updateProduct',compact('product'));
    }

    public function viewProduct($id){
        $product = Products::find($id);
        // dd($product);
        return view('products.readProduct',compact('product'));
    }

    public function removeProduct($id){
        $product=Products::where('id',$id)->first();
        $product->delete();
        return response()->json(['message' => 'success']);
    }

    public function updateProduct(Request $request,$id){
        $product = Products::find($id);
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'mrp'=>'required|numeric',
            'sp'=>'required|numeric',
            'image'=>'nullable|mimes:jpg,jpeg,png,gif|max:10000',
        ]);

        if($product){
            // dd($product->image);
            $ext = $request->image->extension();
            $data = $request->all();
            $imageName = time().'.'.$request->image->extension();
            $request->image->move('products/storedImage/',$imageName);
            Products::where('id', $id)->update([
                'name' => $data['name'],
                'description' => $data['description'],
                'mrp' => $data['mrp'],
                'sprice' => $data['sp'],
                'image' => $imageName
        ]);
            Session::flash('msg','Data Updated Successfully!');
            return redirect()->route('home');
        }
        
    }
}
