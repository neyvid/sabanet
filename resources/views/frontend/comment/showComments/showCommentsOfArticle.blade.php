@foreach($commentsOfArticle as $comment)
    @if($comment->status==\App\Models\Comment\CommentStatus::ACTIVE)
        @include('frontend.comment.showComments.showCommentsOfComment')
    @endif
@endforeach
