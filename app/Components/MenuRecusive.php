<?php

namespace App\Components;

use App\Menu;

class MenuRecusive
{
    private $html;

    public function __construct()
    {
        $this->html = '';
    }

    public function menuRecusiveAdd($parentId = 0, $subMark = '')
    {
        $data = Menu::where('parent_id', $parentId)->get();
        foreach ($data as $dataItem) {
            $this->html .= '<option value="' . $dataItem->id . '">' . $subMark . $dataItem->name . '</option>';
//            gọi đệ quy
            $this->menuRecusiveAdd($dataItem->id, $subMark . '--');
        }

        return $this->html;
    }

//    edit
    public function menuRecusiveEdit($parentIdMenuEdit, $parentId = 0, $subMark = '')
    {
        $data = Menu::where('parent_id', $parentId)->get();
        foreach ($data as $dataItem) {
            if ($parentIdMenuEdit == $dataItem->id) {
                $this->html .= '<option selected value="' . $dataItem->id . '">' . $subMark . $dataItem->name . '</option>';

            } else {
                $this->html .= '<option value="' . $dataItem->id . '">' . $subMark . $dataItem->name . '</option>';
            }
//            gọi đệ quy
            $this->menuRecusiveEdit($parentIdMenuEdit,$dataItem->id, $subMark . '--');
        }

        return $this->html;
    }
}
