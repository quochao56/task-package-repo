<?php

namespace App\Helpers;

class Helper
{
    // recursion
    public static function menu($menus, $parent_id = 0, $char = '')
    {
        $html = '';
        foreach($menus as $key => $menu) {
            if($menu->parent_id ==$parent_id) {
                $html .= '
                <tr>
                    <td>'. $menu->id .'</td>
                    <td>'. $char . $menu->name .'</td>
                    <td>'. self::active($menu->active) .'</td>
                    <td>'. $menu->updated_at .'</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/admin/menus/edit/' . $menu->id . '"><i class="fas fa-edit"></i></a>
                        <a class="btn btn-danger btn-sm" href="#" onclick="removeRow('. $menu->id.', \'/admin/menus/destroy\')" >
                        <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
                ';
                // delete key from menus to reduce data, improve performance
                unset($menus[$key]);

                // call func menu again and put para's child
                $html .= self::menu($menus, $menu->id, $char .'|--');
            }
        }
        return $html;
    }

    public static function active($active = 0): String
    {
        return $active == 0 ? '<span class="btn btn-danger btn-xs">NO</span>' : '<span class="btn btn-success btn-xs">YES</span>';
    }
}
