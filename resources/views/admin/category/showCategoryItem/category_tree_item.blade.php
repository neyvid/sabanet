<option
    {{ $headCategory->id == $category->parent_id ? 'selected=selected' : '' }} value="{{$headCategory->id}}">{{$headCategory->name}}
</option>

@if(isset($categories[$headCategory->id]))
    @include('admin.category.showCategoryItem.category_tree',['collection'=>$categories[$headCategory->id]]);
@endif




