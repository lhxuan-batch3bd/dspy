<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\ProfileUserRequest;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Comment;
use App\User;
use Illuminate\Support\Facades\Hash;
use Gloudemans\Shoppingcart\Facades\Cart;

class PageController extends Controller
{
    //
    public function getPage()
    {
        $product_new  = Product::where('status', 1)->paginate(4,['*'],'product_new');
        $product_featured =  Product::where('featured', 1)->paginate(4,['*'],'product_featured');
        $product_sale =  Product::where('promotion_price', '<>', 0)->paginate(4,['*'],'product_sale');
        return view('frontend.page.trangchu', compact('product_new', 'product_featured', 'product_sale'));
    }
    public function getCategory($id)
    {
        $cate_different = Product::where('id_category', '<>', $id)->paginate(3);
        $category = Category::find($id);
        $category_product = Product::where('id_category', $id)->get();
        return view('frontend.page.cate_type', compact('category_product', 'category', 'cate_different'));
    }
    public function getLogout()
    {
        Cart::destroy();
        Auth::logout();
        return redirect()->route('getPage');
    }
    public function getContact()
    {
        return view('frontend.page.contact');
    }
    public function getAbout()
    {
        return view('frontend.page.about');
    }
    public function getDetailProduct($id)
    {
        $product_featured =  Product::where('featured', 1)->take(5)->get();
        $product_new =  Product::where('status', 1)->take(5)->get();
        $detail_product = Product::find($id);
        $comment = Comment::where('id_product', $id)->orderBy('id', 'desc')->get();
        $product_same = Product::where('id_category', $detail_product->id_category)->paginate(3);
        return view('frontend.page.details', compact('detail_product', 'product_same', 'product_featured', 'product_new', 'comment'));
    }
    public function postComment(Request $request, CommentRequest $req, $id)
    {
        $comment = new Comment;
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->content = $request->content;
        $comment->id_product = $id;
        $comment->save();
        return back();
    }
    public function getUserSetting($id)
    {
        $user = User::find($id);
        return view('frontend.page.usersetting', compact('user'));
    }
    public function postUserSetting(Request $request, ProfileUserRequest $req, $id)
    {

        $curentpwd = Auth::user()->password;
        if (Hash::check($request->oldpassword, $curentpwd)) {

            $user =  User::find($id);
            $user->email = $request->email;
            $user->name = $request->name;
            $user->password = bcrypt($request->newpassword);
            $user->address = $request->address;
            $user->numberphone = $request->phone;
            $user->save();
            return redirect()->route('getPage')->with('update_success', 'Cập nhật thông tin thành công');
        } else {
            return back()->with('setting_fail', 'Mật khẩu cũ không đúng, vui lòng nhập lại');
        }
    }
    public function getTimkiem(Request $req)
    {
        $product = Product::where('name', 'like', '%' . $req->key . '%')
            ->orWhere('unit_price', $req->key)->orWhere('promotion_price', $req->key)->get();
        return view('frontend.page.timkiem', compact('product'));
    }
}
