<?php

namespace App\Http\Controllers;

use App\Category;
use App\Components\Recusive;
use App\Product;
use App\ProductImage;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Foreach_;
use Storage;

class AdminProductController extends Controller
{
    use StorageImageTrait;

    private $category;

    public function __construct(Category $category, Product $product, ProductImage $productImage)
    {
        $this->category = $category;
        $this->product = $product;
        $this->productImage = $productImage;
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
        $dataProductCreate = [
            'name' => $request->name,
            'price' => $request->price,
            'content' => $request->contents,
            'user_id' => auth()->id(),
            'category_id' => $request->category_id

        ];
        $dataUploadFeatureImage = $this->storageTraitUpload($request, 'feature_image_path', 'product');
        //xử lý upload file
//        $file = $request->feature_image_path;
//        $fileNameOrigin = $file->getClientOriginalName();
//        $fileNameHash = str_random(20) . '.'. $file -> getClientOriginalExtension();
//        $filePath = $request->file('feature_image_path')->storeAs('public/product/'. auth()->id(), $fileNameHash);
//        $data =[
//            'file_name' => $fileNameOrigin,  //trả về filename gốc
//            'file_path'=> Storage::url($filePath)
//        ];
        if (!empty($dataUploadFeatureImage)) {
            $dataProductCreate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
            $dataProductCreate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
        }
        $product = $this->product->create($dataProductCreate);
//        dd($product);

        //Insert data to product_images
        if ($request->hasFile('image_path')) {
            foreach ($request->image_path as $fileItem) {
                $dataProductImageDetail = $this->storageTraitUploadMutiple($fileItem, 'product');

                $product->images()->create([
                    'image_path' => $dataProductImageDetail['file_path'],
                    'image_name' => $dataProductImageDetail['file_name'],
                ]);
            }
        }


    }
}
