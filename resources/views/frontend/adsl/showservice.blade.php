@foreach($servicesOfOprator as $service)
    <div class="col-lg-3 order-lg-4 serviceWrap">
        <a href="#" class="serviceContent" data-value="{{$service->id}}">
            <img class="imageOfService" src="{{asset('images/frontend/imageOfService.png')}}" alt="">
            <h4 class="titleOfService">{{$service->name}}</h4>
            <h4 class="periodOfService">{{$service->period}}</h4>
            <p class="descOfService">{{$service->description}}</p>
            <button class="selectBtnOfService btn btn-success btn-block" href="">انتخاب</button>
        </a>
    </div>
@endforeach

<script>
    $(document).ready(function () {
        $('.serviceContent').on('click', function (e) {
            e.preventDefault();
            let serviceId = $(this).data('value');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.post('/addServiceForUser/'+serviceId,function (result) {
                $('.stepRow').remove();
                $('#topMenu').after(result);
            })

        })
    })
</script>
