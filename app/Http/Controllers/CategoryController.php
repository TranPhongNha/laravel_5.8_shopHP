<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    //thực tế
    private $htmlSlelect;
    public function __construct(){
        $this->htmlSlelect ='';
    }
    public function create(){
        //hiển thi category trong databsae
        $data = Category::all();

        // foreach ($data as $value){
        //     if ($value['parent_id'] == 0){
        //         echo "<option>".$value['name']."</option>";

        //         foreach ($data as $value2) {
        //             if($value2['parent_id']== $value['id']){
        //                 echo "<option>".'-'. $value2['name']. "</option>";

        //                 foreach ($data as $value3) {
        //                     if($value3['parent_id']== $value2['id']){
        //                         echo "<option>". '--'. $value3['name']."</option>";
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        //demo
        // $this->categoryRecusive(0);
        //thực tế
        $htmlOption = $this->categoryRecusive(0);
        return view('category.add', compact('htmlOption'));
        //    return view('category.add');
    }
    //đệ Qui
    function categoryRecusive($id, $text =''){
        $data = Category::all();
        foreach ($data as $value){
            if ($value['parent_id'] == $id){
                //demo
                // echo "<option>".$text.$value['name']."</option>";
                //thuc tế
                $this->htmlSlelect .= "<option>".$text.$value['name']."</option>";
                $this->categoryRecusive($value['id'],$text.'-');
            }
        }
         return $this->htmlSlelect;
    }

    public function index(){
        return view('category.index');
    }
}
