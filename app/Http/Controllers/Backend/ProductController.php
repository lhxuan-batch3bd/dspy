<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    //
    public function getDisplayProd()
    {
        $data['product'] = Product::orderBy('id', 'desc')->paginate(10);
        return view('backend.product.display', $data);
    }
    public function getAddProd()
    {
        $category = Category::all();
        return view('backend.product.add', compact('category'));
    }
    public function postAddProd(Request $request, ProductRequest $req)
    {

        $category = new Category;
        $product = new Product;

        $product->name = $request->product_name;
        $product->id_category = $request->category;
        $product->description = $request->desc;
        $product->unit_price = $request->unit_price;
        $product->promotion_price = $request->promotion_price;
        $product->unit = $request->unit;
        $product->status = $request->status;
        $product->unit = $request->unit;
        $product->featured = $request->featured;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'jpeg' && $duoi != 'png') {
                return redirect()->back()->with('error', 'Please chose jpg,jpeg,png file');
            }
            // $filename = time() . '.' . $duoi;
            $filename = $file->getClientOriginalName();
            $file->move('backend/uploads/products/', $filename);
            $product->image = $filename;
        }

        $product->save();
        return redirect()->route('getDisplayProd')->with('add_success', 'Thêm sản phẩm thành công');
    }
    public function getEditProd($id)
    {
        $category = Category::all();
        $product = Product::find($id);
        return view('backend.product.edit', compact('product', 'category'));
    }
    public function postEditProd(Request $request, ProductRequest $req, $id)
    {
        $product = Product::find($id);

        $product->name = $request->name;
        $product->id_category = $request->category;
        $product->description = $request->desc;
        $product->unit_price = $request->unit_price;
        $product->promotion_price = $request->promotion_price;
        $product->status = $request->status;
        $product->unit = $request->unit;
        $product->featured = $request->featured;
        /*Upload Files*/
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'jpeg' && $duoi != 'png') {
                return redirect()->back()->with('upload_error', 'Vui lòng chọn hình ảnh jpg,jpeg,png');
            }
            $filename = $file->getClientOriginalName();
            $file->move('backend/uploads/products/', $filename);
            $product->image = $filename;
        }
        $product->save();
        return redirect()->route('getDisplayProd')->with('update_success', 'Cập nhật sản phẩm thành công');
    }
    public function getDeleteProd($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('getDisplayProd')->with('delete_success', 'Xóa sản phẩm thành công');
    }
    public function getTrashProd()
    {
        $data['product'] = Product::onlyTrashed()->get();
        return view('backend.product.trash', $data);
    }
    public function restoreProd($id)
    {
        $product = Product::find($id);
        Product::withTrashed()->find($id)->restore();
        return redirect()->route('getDisplayProd')->with('restore_success', 'Khôi phục sản phẩm thành công');
    }
    public function getSearch(Request $req)
    {
        $product = Product::where('name', 'like', '%' . $req->key . '%')
            ->orWhere('unit_price', $req->key)->orWhere('promotion_price', $req->key)->get();
        return view('backend.product.search', compact('product'));
    }
}
