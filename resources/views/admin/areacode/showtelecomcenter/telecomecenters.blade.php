<div class="form-group telecomCenters">

    @if(count($telecomCenters)==0)
        <div class="alert alert-warning">
            مرکزمخابراتی برای شهر انتخابی شما ثبت نگردید است ! لطفا ابتدا مرکز مخابراتی برای این شهر تعریف کنید.
        </div>
    @else
        <label>پیش شماره متعلق به کدام مرکزمخابراتی از شهر  انتخابی می باشد : </label>
        <select class="form-control telecom" name="telecomcenter" style="width: 100%;">
            @foreach($telecomCenters as $telecomCenter)
                <option value="{{$telecomCenter->id}}">{{$telecomCenter->name}}</option>
            @endforeach
        </select>

    @endif
</div>
