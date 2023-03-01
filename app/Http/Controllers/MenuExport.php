<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MenuExport implements FromCollection, WithHeadings
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function headings(): array
    {
        return [
            'STT',
            'Tên thực đơn',
            'Mô tả',
            'Thực đơn ngày',
            'Nhóm trẻ',
            'Tên người tạo',
            'Số tiền',
            'Số lượng kalo',
            'Số lượng đạm',
            'Số lượng chát béo',
            'Số lượng tinh bột',
        ];
    }

    public function collection()
    {
        $count = 1;
        return $this->data->map(function ($item) use(&$count) {
            return [
                $count++,
                $item->name,
                $item->description,
                $item->menu_date,
                $item->children_type_name,
                $item->user_name,
                $item->cost,
                $item->kalo,
                $item->protein,
                $item->lipid,
                $item->carb,
            ];
        });
    }
}
