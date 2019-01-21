<div class="form-group city">
    @if(count($cities)==0)
        <div class="alert alert-warning">
            شهری برای استان انتخابی شما ثبت نگردید است ! لطفا ابتدا شهری برای این استان تعریف نمایید.
        </div>
    @else
        <label>پیش شماره متعلق به کدام شهر از استان می باشد : </label>
        <select class="form-control cities" name="city" style="width: 100%;">
            @foreach($cities as $city)
                <option  value="{{$city->id}}">{{$city->name}}</option>
            @endforeach
        </select>

    @endif

</div>
<script>
    $('.cities').on('select2:select', function (e) {
        var cityId = e.params.data.id;

        showtelecomeOfCity(cityId);
    });

</script>
