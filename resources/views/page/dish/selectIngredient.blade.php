<div id="ingredient">
<label>
    <select id="districts" name="ingredient_id[]" class="form-control">
        <option selected disabled>Chọn món </option>
        @foreach($ingredient as $each)
            <option value="{{$each->id}}">{{$each->name}}</option>
        @endforeach
    </select>
    <div class="form-group mt-3">
        <label for="example-email">Số Lượng</label>
        <input type="text" name="quantity[]" class="form-control">
    </div>
</label>
</div>

