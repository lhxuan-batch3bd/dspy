<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\Customer;
use App\Models\BillDetail;
use App\Models\Product;
use Customers;

class BillController extends Controller
{
    //
    public function getDisplayBill()
    {
        $bill = Bill::orderBy('id','desc')->paginate(4);
        return view('backend.bill.display', compact('bill'));
    }
    public function getCustomer($id)
    {
        $customer = Customer::find($id);
        return view('backend.bill.customer', ['customer' => $customer]);
    }
    public function getBillDetail($id)
    {
        $bill_detail = BillDetail::where('id_bill',$id)->get();
        $bill = Bill::find($id);
        $product = Product::all();
        return view('backend.bill.bills_detail',compact('bill_detail','bill','product'));
    }
    public function postDeleteBill($id)
    {
        $bill = Bill::find($id);

        $bill->Delete();
        return back()->with('delete_success', 'Xóa hóa đơn thành công');
    }
    public function getTrashBill()
    {
        $bill['bill'] = Bill::onlyTrashed()->get();
        return view('backend.bill.trash', $bill);
    }
    public function restore($id)
    {
        Bill::withTrashed()->find($id)->restore();
        return redirect()->route('getDisplayBill')->with('restore_success', 'Khôi phục hóa đơn thành công');
    }
}
