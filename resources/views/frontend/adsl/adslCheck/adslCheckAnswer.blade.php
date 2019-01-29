<div class="col-12 p-0 mt-3 responseOfAdslCheck">
    <table class="table table-bordered">
        <thead class="bg-primary">
        <tr class="text-nowrap">
            <th>شهر</th>
            <th>نام مرکز</th>
            <th>پیش شماره شما</th>
            <th>وضعیت</th>
        </tr>
        </thead>
        <tbody>
        <tr class="text-nowrap">
            <td>{{$areaCode->city->name}}</td>
            <td>{{$areaCode->telecomcenter->name}}</td>
            <td>{{$areaCode->areacode}}</td>
            <td style="white-space: normal">تحت پوشش
                {{$areaCode->present()->showOpratorName}}
            </td>
        </tr>
        </tbody>

    </table>
    <a href="{{route('registerAdslUser')}}" class="btn btn-primary">خریدآنلاین</a>

</div>
