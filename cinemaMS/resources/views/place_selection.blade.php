    <div class='selection'>
        <div class='sel-form'>
            <form action="select_response" style='align-self:left;' method="POST" class="form-control-dark" id='sel-form'>
                @csrf
                <select name="selection_1" onchange="this.form.submit()" class="form-select bg-dark text-white">
                    <option>-------</option>
                    @foreach ($province as $item)
                        <option value={{ $item->province_id }}>{{ $item->province_name }}</option>
                    @endforeach
                </select>
            </form>
            <h6 style="color: white;">:انتخاب استان</h6>
        </div>
        <div class='sel-form'>
            <form action="select_response2" method="POST" id='sel-form'>
                @csrf
                <select name="selection_2" onchange="this.form.submit()" class="form-select bg-dark text-white">
                    <option>-------</option>
                    @foreach ($city as $item)
                        <option value={{ $item->city_id }}>{{ $item->city_name }}</option>
                    @endforeach
                </select>
            </form>
            <h6 style="color: white;">:انتخاب شهر</h6>
        </div>
        <div class='sel-form'>
            <form action="select_response3" method="POST" id='sel-form'>
                @csrf
                <select name="selection_3" onchange="this.form.submit()" class="form-select bg-dark text-white">
                    <option>-------</option>
                    @foreach ($cinema as $item)
                        <option value={{ $item->cinema_id }}>{{ $item->cinema_name }}</option>
                    @endforeach
                </select>
            </form>
            <h6 style="color: white;">:انتخاب سینما</h6>
        </div>
    </div>
