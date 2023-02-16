<span style="font-family: vazir;">
    <label for="province" style='margin:3px;'>استان:</label>
    <select id="province_selection" name="province" class="form-select"
        style='margin-bottom:20px; background-color:rgba(193, 235, 255);'>
        <option value=0>انتخاب همه</option>
        @foreach ($provinces as $item)
            <option value={{ $item->id }}>{{ $item->province_name }}
            </option>
        @endforeach
    </select>
    <label for="city" style='margin:5px;'> شهر:</label>
    <select id="city_selection" name="city" class="form-select"
        style='margin-bottom:20px; background-color:rgba(193, 235, 255);'> 
        <option>----------</option>                             
    </select>
</span>
