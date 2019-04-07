@extends('layout.frontend.home')
@section('content')
    <div class="breadcrumbLine">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 breadcrumbContent">
                    <a href="">صفحه نخست
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="">صفحه دوم
                        <i class="fa fa-angle-left"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="mainContent">
        <div class="container">
            <div class="row">
                {{--left Side--}}
                <div class="col-lg-3">
                    <div class="row leftSideOfContent">
                        <div class="col-9 leftSideContent">
                            <strong>
                                گفت‌وگوی آنلاین
                            </strong>
                            <p>کارشناسان ما همیشه در دسترس‌اند</p>
                        </div>
                        <div class="col-3 rightSideContent">
                            <img src="{{asset('images/socialIcon/whatsapp.svg')}}" width="40px" height="40px"
                                 alt="">
                        </div>
                    </div>
                    <div class="row leftSideOfContent">
                        <div class="col-9 leftSideContent">
                            <strong>
                                گفت‌وگوی آنلاین
                            </strong>
                            <p>کارشناسان ما همیشه در دسترس‌اند</p>
                        </div>
                        <div class="col-3 rightSideContent">
                            <img src="{{asset('images/socialIcon/whatsapp.svg')}}" width="40px" height="40px"
                                 alt="">
                        </div>
                    </div>
                    <div class="row leftSideOfContent">
                        <div class="col-9 leftSideContent">
                            <strong>
                                گفت‌وگوی آنلاین
                            </strong>
                            <p>کارشناسان ما همیشه در دسترس‌اند</p>
                        </div>
                        <div class="col-3 rightSideContent">
                            <img src="{{asset('images/socialIcon/whatsapp.svg')}}" width="40px" height="40px"
                                 alt="">
                        </div>
                    </div>
                    <div class="row leftSideOfContent">
                        <div class="col-9 leftSideContent">
                            <strong>
                                گفت‌وگوی آنلاین
                            </strong>
                            <p>کارشناسان ما همیشه در دسترس‌اند</p>
                        </div>
                        <div class="col-3 rightSideContent">
                            <img src="{{asset('images/socialIcon/whatsapp.svg')}}" width="40px" height="40px"
                                 alt="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col p-0">
                            <div class="ourServiceInSide">
                                <div class="ourServiceSideTitle">
                                    <p>
                                        خدمات نوید نت
                                    </p>
                                </div>
                                <div class="ourServiceSideContent">
                                    <ul class="p-0 m-0">
                                        <li>
                                            <a class="ourServiceContentTitle" href="">پهنای باند</a>
                                            <span class="ourServiceContentSign"><i class="fa fa-plus-square"></i></span>
                                            <ul class="childLi" style="display: none">
                                                <li>asda</li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a class="ourServiceContentTitle" href="">پهنای باند</a>
                                            <span class="ourServiceContentSign"><i class="fa fa-plus-square"></i></span>
                                            <ul class="childLi" style="display: none">
                                                <li>asda</li>
                                            </ul>
                                        </li>

                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>


                </div>
                {{--Right Side (article Content)--}}
                <div class="col-lg-9">
                    <article class="postMainContent" dir="rtl">
                        <h1 id="postTitle">{{$article->title}}</h1>
                        <div class="postContent">
                            {!!$article->body  !!}
                        </div>
                    </article>
                </div>
            </div>
            {{--Comment Wrap
            --}}
            <div class="commentWrap " dir="rtl">
                <div class="row">
                    <div class="col-lg-12 titleOfComments p-3">
                        <i class="fa fa-comments-o fa-3x">

                        </i>
                        <h4 class="d-inline-block">دیدگاه کاربران</h4>
                    </div>
                </div>
                {{--this  comment Wrap should be loop--}}
                @if(count($comments)>0 )
                    @include('frontend.comment.showComments.showCommentsOfArticle',['commentsOfArticle'=>$comments[0]])
                @endif
            </div>


            <div class="row comment_form_wrap mt-5" dir="rtl">


                @if (session('success'))

                    <div class="alert alert-success col-lg-12">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="col-lg-12 commentForm_title">
                    <i class="fa fa-plus-square "></i><span>ارسال دیدگاه</span>
                </div>
                <div class="col-lg-12 commentForm_body p-4">
                    <form method="post" action="{{route('comment.store')}}">{{csrf_field()}}
                        <div class="form-group">
                            <label>دیدگاه خود را بنویسید:</label>
                            <textarea class="form-control"
                                      name="comment" rows="5"
                                      cols="80"></textarea>
                            <input
                                type="hidden" id="article_id_input" name="article_id" value="{{$article->id}}"><input
                                type="hidden" id="comment_parent" name="comment_parent" value="0"></div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-success">ثبت</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>


    </div>

    <script>
        $(document).ready(function () {
            $('.replyBtn').on('click', function (e) {
                e.preventDefault();
                $('.comment_form_wrap').remove();
                var commentId = $(this).data('comment');
                var formForReply = '<div class="row comment_form_wrap mt-5" dir="rtl"><div class="col-lg-12 commentForm_title"><i class="fa fa-plus-square "></i><span>ارسال دیدگاه</span><span  class="deleteReplyForm">(لغو پاسخ)</span></div><div class="col-lg-12 commentForm_body p-4"><form method="post" action="{{route('comment.store')}}">{{csrf_field()}}<div class="form-group"><label>دیدگاه خود را بنویسید:</label><textarea class="form-control" name="comment" rows="5" cols="80"></textarea><input type="hidden" id="article_id_input" name="article_id" value="{{$article->id}}"><input type="hidden"  id="comment_parent" name="comment_parent" value="' + commentId + '"></div><div class="box-footer"><button type="submit" class="btn btn-success">ثبت</button></div></form></div></div>'
                var parent = $(this).closest('.comment_wrap').find('.replyCommentFormWrap').append(formForReply);
                console.log(parent);
            });

            $(document).on('click', '.deleteReplyForm', function () {
                var formForReply = '<div class="row comment_form_wrap mt-5" dir="rtl"><div class="col-lg-12 commentForm_title"><i class="fa fa-plus-square "></i><span>ارسال دیدگاه</span></div><div class="col-lg-12 commentForm_body p-4"><form method="post" action="{{route('comment.store')}}">{{csrf_field()}}<div class="form-group"><label>دیدگاه خود را بنویسید:</label><textarea class="form-control" name="comment" rows="5" cols="80"></textarea><input type="hidden" id="article_id_input" name="article_id" value="{{$article->id}}"><input type="hidden"  id="comment_parent" name="comment_parent" value="0"></div><div class="box-footer"><button type="submit" class="btn btn-success">ثبت</button></div></form></div></div>'
                $(this).closest('.comment_form_wrap').remove();
                $('.commentWrap').last().after(formForReply);
            })
        });

    </script>
@endsection
