<div class="form-group"><label>نام شرکت :</label><span>{{ \Illuminate\Support\Facades\Auth::user()->companyName }}</span></div>
<div class="form-group"><label>نام رابط شرکت:</label><span>{{\Illuminate\Support\Facades\Auth::user()->connectorName }}</span></div>
<div class="form-group"><label>نام خانوادگی رابط شرکت:</label><span>{{\Illuminate\Support\Facades\Auth::user()->connectorLastname }}</span></div>
<div class="form-group"><label>شماره موبایل رابط شرکت:</label><span>{{ \Illuminate\Support\Facades\Auth::user()->connectorMobile }}</span></div>
<div class="form-group"><label>کدملی رابط شرکت:</label><span>{{\Illuminate\Support\Facades\Auth::user()->connectorCodeMeli }}</span></div>
<div class="form-group"><label>ایمیل رابط شرکت:</label><span>{{\Illuminate\Support\Facades\Auth::user()->connectorEmail}}</span></div>
<div class="form-group">
    <a href="{{route("frontend.user.addinfo")}}" class="btn btn-success">ویرایش اطلاعات شرکت</a>
</div>
