<?php

namespace App\Http\Controllers;

use App\Category;
use App\Components\Recusive;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        return view('admin.product.index');
    }

    public function create()
    {
        $htmlOption = $this->getCategory($parentId = '');
        return view('admin.product.add', compact('htmlOption'));
    }

    // phương thức lấy category dùng chung
    public function getCategory($parentId)
    {
        $data = $this->category->all();
        //lấy recusive qua, khi new 1 cái contructer thì sẽ nhận 1 biến data
        $recusive = new Recusive($data);
        // sau khi gọi được hàm thì khai báo phương thức
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }
}
