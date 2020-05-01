<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\BillDetail;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use App\Http\Requests\CustomerRequest;
use Illuminate\Support\Facades\Mail;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php';

class CartController extends Controller
{
    //
    public function getCartDetail()
    {
        $total = Cart::total();
        $data = Cart::content();
        return view('frontend.page.cartdetail', compact('data', 'total'));
    }
    public function getAddCart($id)
    {
        if (Auth::check()) {
            $product = Product::find($id);
            if ($product->promotion_price != 0) {
                Cart::add(['id' => $id, 'name' => $product->name, 'qty' => 1, 'price' => $product->promotion_price, 'options' => ['img' => $product->image]]);
            } else {
                Cart::add(['id' => $id, 'name' => $product->name, 'qty' => 1, 'price' => $product->unit_price, 'options' => ['img' => $product->image]]);
            }
            return back();
        } else {
            return redirect()->route('getLogin')->with('login_cart', 'Vui lòng đăng nhập để mua hàng');
        }
    }
    public function getDelCart($id)
    {
        if ($id == 'all') {
            Cart::destroy();
        } else {
            Cart::remove($id);
        }
        return back();
    }
    public function updateCart(Request $request)
    {
        Cart::update($request->rowId, $request->qty);
    }
    public function BuyCart(Request  $request, CustomerRequest $req)
    {


        $cartInfor = Cart::content();

        $customer = new Customer;
        $customer->name = ucwords($request->name);
        $customer->email = $request->email;
        $customer->phonenumber = $request->phone;
        $customer->address = $request->address;
        $customer->save();


        $bill = new Bill();
        $bill->id_customer = $customer->id;
        $bill->dateorder = date('Y-m-d');
        $bill->total = Cart::total();
        $bill->payment = $request->payment_method;
        $bill->save();



        if (count($cartInfor) > 0) {
            foreach ($cartInfor as $key => $item) {
                $bill_detail = new BillDetail();
                $bill_detail->id_bill = $bill->id;
                $bill_detail->id_product = $item->id;
                $bill_detail->quantity = $item->qty;
                $bill_detail->price = $item->price;
                $bill_detail->save();
            }
        }
        $data['infor'] = $request->all();
        $data['cart'] = Cart::content();
        $data['total'] = Cart::total();
        $email = $request->email;
        // $body = file_get_contents(resource_path('views/frontend/page/email.blade.php'));
        $body = view('frontend.page.email',$data,[])->render();
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = 0;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'luongbaotin2020@gmail.com';                     // SMTP username
            $mail->Password   = 'Tinyeuthao123';                               // SMTP password
            $mail->SMTPSecure =  'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom('luongbaotin@gmail.com', 'Đặc sản Phú Yên');
            $mail->addAddress($email);     // Add a recipient
            $mail->addCC('luongbaotin2020@gmail.com');
            $mail->CharSet = 'UTF-8';
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Xác nhận đơn hàng Đặc sản Phú Yên';
            $mail->Body    = $body;
            $mail->AltBody = '';
            $mail->send();
            echo 'Đã gửi đơn xác nhận';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }


         // if ($request->payment_method == "COD") {
        //     Mail::send('frontend.page.email', $data, function ($message) use ($email) {
        //         $message->from('luongbaotin2020@gmail.com', 'Luong Bao Tin');
        //         $message->to($email, $email);
        //         $message->cc('tinpro67@gmail.com', 'Tin Pro');

        //         $message->subject('Xác nhận đơn hàng của Đặc sản Phú Yên');
        //     });
        // } else {
        //     Mail::send('frontend.page.email2', $data, function ($message) use ($email) {
        //         $message->from('luongbaotin2020@gmail.com', 'Luong Bao Tin');
        //         $message->to($email, $email);
        //         $message->cc('tinpro67@gmail.com', 'Tin Pro');

        //         $message->subject('Xác nhận đơn hàng của Đặc sản Phú Yên');
        //     });
        // }
        Cart::destroy();
        return redirect()->route('getComplete');
    }

    public function getComplete()
    {
        return view('frontend.page.complete');
    }
}
