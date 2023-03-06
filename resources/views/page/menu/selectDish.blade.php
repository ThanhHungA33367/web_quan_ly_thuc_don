@foreach($meals as $each1)
<div>
    <div class="meal">

        <select class="custom-select mb-3" name="meal_id[]">
            <option value="{{$each1->id}}">{{$each1->name}}</option>
        </select>
        <div>
            <select class="custom-select mb-3 select_dish_type" name="dish_id{{$loop->iteration}}[]" data="{{$each1->id}}" value="">
                <option selected disabled value="test"> Chọn món</option>
                @isset($dish1)
                @foreach($dish1 as $each2)
                <option value="{{$each2->id}}">{{$each2->name}}</option>
                @endforeach
                @endisset

            </select>
            <!-- <div id="selectDish" class="form-group mb-3 selectDish"></div> -->
        </div>
    </div>
    <button type="button" name="add" id="dynamic-ar" class="btn btn-primary dynamic-ar" data="{{$each1->id}}">+</button>
</div>
@endforeach
<script>
    $('.dynamic-ar').on('click', (function(e) {
        let meal_id = e.target.getAttribute('data')
        e.preventDefault();
        let element = e.target
        var more_fields = `
   
             <select class="custom-select mb-3 select_dish_type" name="dish_id[]"   data="${meal_id}">
                <option selected disabled value=""> Chọn món3</option>
                @isset($dish1)
                @foreach($dish1 as $each2)
                <option value="{{$each2->id}}">{{$each2->name}}</option>
                @endforeach
                @endisset
            </select>
       
        
            `;

        let div = document.createElement('div')
        div.innerHTML = more_fields
        element.parentElement.querySelector(".meal").appendChild(div);
        BindOnchange();
    }));


    function BindOnchange() {
        $('.select_dish_type').on('change', function(event) {
            let dish_type_id = $(this).val();
            let element = event.target
            console.log(dish_type_id);

        });
    }


    $(document).ready(BindOnchange);
</script>