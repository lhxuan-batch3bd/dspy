<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    //
    public function getDisplayCate()
    {
        $data['category'] = Category::all();
        return view('backend.category.display', $data);
    }
    public function getAddCate()
    {
        return view('backend.category.add');
    }
    public function postAddCate(Request $request, CategoryRequest $rq)
    {
        $category = new Category;
        $category->name = $request->name;
        $category->description = $request->desc;
        $category->save();
        return redirect()->route('getDisplayCate')->with('add_success', 'Thêm danh mục thành công');
    }
    public function getEditCate($id)
    {
        $category['category'] = Category::find($id);
        return view('backend.category.edit', $category);
    }
    public function postEditCate(Request $request, CategoryRequest $rq, $id)
    {
        $category = Category::find($id);
        $category->name = $request->name;
        $category->description = $request->desc;
        $category->save();
        return redirect()->route('getDisplayCate')->with('update_success', 'Cập nhật danh mục thành công');
    }
    public function postDeleteCate($id)
    {
        $category = Category::find($id);

        $category->Delete();
        return back()->with('delete_success', 'Xóa danh mục thành công');
    }
    public function getTrashCate()
    {
        $category['category'] = Category::onlyTrashed()->get();
        return view('backend.category.trash', $category);
    }
    public function restore($id)
    {
        Category::withTrashed()->find($id)->restore();
        return redirect()->route('getDisplayCate')->with('restore_success', 'Khôi phục danh mục thành công');
    }
}
