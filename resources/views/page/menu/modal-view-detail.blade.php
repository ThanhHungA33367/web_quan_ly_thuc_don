<table>
    <tr>
        <th>Tên món ăn</th>
        <th style="padding-left:20px">Tên thực đơn</th>
        <th style="padding-left:20px">Kalo</th>
        <th style="padding-left:20px">Protein</th>
        <th style="padding-left:20px">Lipid</th>
        <th style="padding-left:20px">Carb</th>
        <th style="padding-left:20px">Cost</th>
        <th style="padding-left:20px">Loại trẻ</th>
        <th style="padding-left:20px">Kalo</th>
        <th style="padding-left:20px">Protein</th>
        <th style="padding-left:20px">Lipid</th>
        <th style="padding-left:20px">Carb</th>
        <th style="padding-left:20px">Cost</th>

    </tr>
    @foreach($data_dish as $each)
    <tr>
        <td>
            {{$each->name}}
        </td>

        @foreach($data_menu as $each2)
        <td style="padding-left:20px">
            {{$each2->name}}
        </td>
        <td style="padding-left:20px">
            {{$each2->kalo}}
        </td>
        <td style="padding-left:20px">
            {{$each2->protein}}
        </td>

        <td style="padding-left:20px">
            {{$each2->lipid}}
        </td>

        <td style="padding-left:20px">
            {{$each2->carb}}
        </td>

        <td style="padding-left:20px">
            {{$each2->cost}}
        </td>
        @endforeach
        @foreach($data_children_type as $each1)
        <td style="padding-left:20px">
            {{$each1->name}}
        </td>
        <td style="padding-left:20px">
            {{$each1->kalo_day}}
        </td>
        <td style="padding-left:20px">
            {{$each1->protein}}
        </td>
        <td style="padding-left:20px">
            {{$each1->lipid}}
        </td>
        <td style="padding-left:20px">
            {{$each1->carb}}
        </td>
        <td style="padding-left:20px">
            {{$each1->cost}}
        </td>

        @endforeach

    </tr>
    @endforeach


</table>