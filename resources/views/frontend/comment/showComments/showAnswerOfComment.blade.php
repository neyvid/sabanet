@foreach($commentsOfArticle as $item)
    @if($item->status==\App\Models\Comment\CommentStatus::ACTIVE)
    <div class="col-lg-11 order-3 answer_wrap">
        <div class="row">
            <div class="col-lg-2 order-1 text-center">
                <span class="personIcon"><i class="fa fa-user-circle-o fa-4x "></i></span>
                <p class="comment_user_name">{{$item->user->name}}</p>
                <p class="comment_date">{{\App\Services\JalaliDate\JalaliDate::get_date_in_jalali_without_time($item->created_at)}}</p>
            </div>
            <div class="col-lg-9 order-2">
                {{$item->body}}
            </div>
        </div>

    </div>
    @endif
@endforeach
