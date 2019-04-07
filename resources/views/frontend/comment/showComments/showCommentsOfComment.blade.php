<div class="row mt-4 comment_wrap">
    <div class="col-lg-3 order-1 text-center">
        <span class="personIcon"><i class="fa fa-user-circle-o fa-4x "></i></span>
        <p class="comment_user_name"> {{$comment->user->name}}</p>
        <p class="comment_date">{{\App\Services\JalaliDate\JalaliDate::get_date_in_jalali_without_time($comment->created_at)}}</p>
    </div>
    <div class="col-lg-9 order-2">
        {{$comment->body}}
        <div class="answerIcon text-right ml-4">
            <a class="replyBtn" data-comment="{{$comment->id}}">
                <i class="fa fa-reply "></i>
                <span>
                                    پاسخ
                </span>
            </a>
        </div>
    </div>
    <div class="col-lg-12 order-3 replyCommentFormWrap  pt-0 pl-5 pr-5">

    </div>

    @if(isset($comments[$comment->id]))
        @include('frontend.comment.showComments.showAnswerOfComment',['commentsOfArticle'=>$comments[$comment->id]])
    @endif
</div>
