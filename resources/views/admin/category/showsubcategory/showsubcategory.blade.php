<div class="form-group subCategory">
    <label>زیرگروه (درصورتیکه دسته بندی مورد نظر شما متعلق به دسته دیگری هست از لیست زیر آنرا
        انتخاب نمایید در غیر اینصورت اگر دسته مورد نظر ، دسته اصلی هست از لیست زیر 'مادر' را
        انتخاب نمایید) : </label>
    <select class="form-control parent" name="parent_id" style="width: 100%;">
        @if(isset($categoryOfThisType))
            <option value="0">مادر</option>
            @foreach($categoryOfThisType as $categoryOfType)
                <option value="{{$categoryOfType->id}}">{{$categoryOfType->name}}</option>
            @endforeach
        @endif
    </select>

</div>
