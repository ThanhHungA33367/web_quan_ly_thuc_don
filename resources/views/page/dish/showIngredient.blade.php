<div id="show">
    <table>
        <tr>
        <th >thực phẩm</th> &nbsp; &nbsp;
        <th style="padding-left: 50px">số lượng</th>
        <th style="margin-left: 50px"></th>

        </tr>
@foreach($object as $each)
        <tr style="padding-top: 20px">
            <td>
              {{$each->ingredients_name}}
            </td>
            <td style="padding-left: 70px";>
                {{$each->quantity}}
            </td>
            <td>
                <button class="btn btn-xs btn-danger " style=" margin-left:50px" id="mediumButton"  onclick="Delete1({{$each->id}},this)" type="button">Xóa</button>
            </td>
        </tr>
    @endforeach
    </table>
</div>

<script>
    function Delete1(id,_this){
        var result = confirm("Bạn có chắc muốn xóa  không?");
        if (result) {
            $.ajax({
                url: `/dish/delete_ingredient`,
                method:"get",
                data:{
                    id:id,
                },
                beforeSend: function() {
                    $('#loader').show();
                },
                // return the result
                success: function(res) {
                    $(_this).closest('tr').remove();


                },
                complete: function() {
                    $('#loader').hide();
                },
                error: function(jqXHR, testStatus, error) {
                    console.log(error);
                    // alert("Page " + href + " cannot open. Error:" + error);
                    // $('#loader').hide();
                },
                timeout: 8000
            })




        }


        }

</script>
