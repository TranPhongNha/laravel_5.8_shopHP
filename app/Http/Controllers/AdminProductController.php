<?php

namespace App\Http\Controllers;

use App\Category;
use App\Components\Recusive;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Storage;
class AdminProductController extends Controller
{
    use StorageImageTrait;
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

    public function store(Request $request)
    {
        $dataUpload = $this->storageTraitUpload($request,'feature_image_path','product');
        //xử lý upload file
//        $file = $request->feature_image_path;
//        $fileNameOrigin = $file->getClientOriginalName();
//        $fileNameHash = str_random(20) . '.'. $file -> getClientOriginalExtension();
//        $filePath = $request->file('feature_image_path')->storeAs('public/product/'. auth()->id(), $fileNameHash);
//        $data =[
//            'file_name' => $fileNameOrigin,  //trả về filename gốc
//            'file_path'=> Storage::url($filePath)
//        ];
        dd($dataUpload);
    }
}
