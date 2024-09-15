<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="pixelstrap" />
    <title>Admiro - Premium Admin Template</title>
    <!-- Favicon icon-->
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon" />
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon" />
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz,wght@6..12,200;6..12,300;6..12,400;6..12,500;6..12,600;6..12,700;6..12,800;6..12,900;6..12,1000&amp;display=swap" rel="stylesheet" />
    <!--fontawesome-->
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome-min.css') }}" />
    <!-- App css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link id="color" rel="stylesheet" href="{{ asset('assets/css/color-1.css') }}" media="screen" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

    <style>
        /* Hover effect untuk ikon */
        .btn:hover .fa-paper-plane {
            color: #308e87;
            /* Warna ikon saat tombol di-hover */
        }
    </style>
</head>

<body>
    <!-- page-wrapper Start-->
    <!-- tap on top starts-->
    <div class="tap-top"><i class="fas fa-arrow-up"></i></div>
    <!-- tap on tap ends-->
    <!-- loader-->
    <div class="loader-wrapper">
        <div class="loader"><span></span><span></span><span></span><span></span><span></span></div>
    </div>
    <div class="page-wrapper compact-wrapper sidebar-open" id="pageWrapper">
        <!-- Page Body Start-->
        <div class="page-body-wrapper">
            <div class="page-body">
                <div class="container-fluid">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-sm-6 col-12">
                                <img style="width: 200px; height: auto;" src="{{ asset('assets/images/logo/logo1.png') }}" alt="logo">
                            </div>
                            <div class="col-sm-6 col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><button class="btn btn-pill btn-primary" type="button" onclick="window.location.href='{{ route('logout') }}'">Logout</button></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Container-fluid starts-->
                <div class="container-fluid">
                    <div class="user-profile social-app-profile">
                        <div class="row">
                            <!-- user profile first-style start-->
                            <div class="col-sm-12 box-col-12">
                                <div class="card hovercard text-center">
                                    <div class="cardheader socialheader"></div>
                                    <div class="user-image">
                                        <div class="avatar"><img alt="" src="{{ asset('assets/images/foto.jpg') }}" /></div>
                                    </div>
                                    <div class="info market-tabs p-0">
                                        <ul class="nav nav-tabs border-tab tabs-scoial" id="top-tab" role="tablist">

                                            <li class="nav-item"><a class="nav-link active" id="top-about" data-bs-toggle="tab" href="#about" role="tab" aria-controls="about" aria-selected="false">Home</a></li>
                                            <li class="nav-item">
                                                <div class="user-designation border-0"></div>
                                                <div class="title"><a target="_blank" href="">{{ $first_name }} {{ $last_name }}</a></div>
                                                <div class="desc mt-2">Selamat Datang</div>
                                            </li>
                                            <li class="nav-item"><a class="nav-link" id="top-timeline" data-bs-toggle="tab" href="#timeline" role="tab" aria-controls="timeline" aria-selected="true">Timeline</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content" id="top-tabContent">
                            <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="about">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="new-users-social">
                                                    <div class="d-flex gap-3">
                                                        <div class="flex-grow-1">
                                                            <h6 class="mb-0">New Post</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <form action="{{ url('/upload') }}" method="POST" enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleFormControlTextarea1">Foto</label>
                                                        <input class="form-control @error('foto') is-invalid @enderror" type="file" id="foto" name="foto">
                                                        @error('foto')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleFormControlTextarea1">Description</label>
                                                        <textarea class="form-control @error('description') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3" id="description" name="description">{{ old('email') }}</textarea>
                                                        @error('description')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6"></div>
                                                        <div class="col-sm-6">
                                                            <button class="btn btn-pill btn-info btn-block" style="width: 100%;" type="submit">Post</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @foreach ($list_post as $post)
                                <div class="card">
                                    <div class="card-body">
                                        <div class="new-users-social">
                                            <div class="d-flex gap-3"><img class="rounded-circle image-radius m-r-15" src="@if($post->user->id === $user_id) {{ asset('assets/images/foto.jpg') }} @else {{ asset('assets/images/foto2.jpg') }} @endif" alt="">
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-0">{{ $post->user->first_name }} {{ $post->user->last_name }}</h6>
                                                    <p>{{ $post->created_at->diffForHumans() }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-5">
                                                <img class="img-fluid" alt="" src="{{ asset($post->image_url) }}">
                                                <div class="timeline-content">
                                                    <p>{{ $post->content }}</p>
                                                    <div class="like-content">
                                                        <h5>

                                                            <span>
                                                                @if($post->liked_by_current_user)
                                                                <form action="{{ url('/unlike') }}" method="POST">
                                                                    @csrf
                                                                    <input hidden name="post_id" value="{{ $post->id }}">
                                                                    <button class="btn btn-transparent" type="submit" id="btn_like{{ $post->id }}">
                                                                        <i class="fas fa-heart" style="color: #ff2600;"></i>
                                                                    </button>
                                                                    <span>{{ $post->like_count }}</span>
                                                                </form>

                                                                @else
                                                                <form action="{{ url('/like') }}" method="POST">
                                                                    @csrf
                                                                    <input hidden name="post_id" value="{{ $post->id }}">
                                                                    <button class="btn btn-transparent" type="submit" id="btn_unlike{{ $post->id }}">
                                                                        <i class="far fa-heart" style="color: #ff2600;"></i>
                                                                    </button>
                                                                    <span>{{ $post->like_count }}</span>
                                                                </form>
                                                                @endif

                                                            </span>
                                                            <span class="pull-right comment-number">
                                                                <span>{{ $post->comments->count() }} </span>
                                                                <span>
                                                                    <i class="fa-solid fa-comment me-0"></i>
                                                                </span>
                                                            </span>
                                                        </h5>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-sm-7">
                                                <div class="timeline-content">
                                                    <div class="social-chat">
                                                        @foreach ($post->comments as $comment)
                                                        <div class="comment @if($comment->user_id === $user_id) your-msg @else other-msg @endif">
                                                            <div class="d-flex gap-3">
                                                                <img class="img-50 img-fluid m-r-20 rounded-circle" src="@if($comment->user_id === $user_id) {{ asset('assets/images/foto.jpg') }} @else {{ asset('assets/images/foto2.jpg') }} @endif" alt="">
                                                                <div class="flex-grow-1">
                                                                    <span class="f-w-700">{{ $comment->user->first_name }} {{ $comment->user->last_name }} <span>{{ $comment->created_at->diffForHumans() }} <i class="fa-solid fa-reply font-primary"></i></span></span>
                                                                    <p>{{ $comment->comment }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                        @if($post->comments->count() <> 0) <div class="text-center" hidden><a href="#">More Commnets</a></div> @endif

                                                    </div>
                                                    <div class="comments-box">
                                                        <div class="d-flex gap-3"><img class="img-50 img-fluid m-r-20 rounded-circle" alt="" src="{{ asset('assets/images/foto.jpg') }}">
                                                            <div class="flex-grow-1">
                                                                <form action="{{ url('/comment') }}" method="POST">
                                                                    @csrf
                                                                    <div class="input-group text-box">
                                                                        <input hidden name="post_id" value="{{ $post->id }}">
                                                                        <input class="form-control input-txt-bx" type="text" name="comment" placeholder="Post Your commnets">
                                                                        <div class="input-group-append">
                                                                            <button class="btn btn-transparent" type="submit"><i class="fas fa-paper-plane"></i></button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="tab-pane fade" id="timeline" role="tabpanel" aria-labelledby="timeline">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="likes-profile text-center">
                                                    <h3>Like</h3>
                                                    <h5> <span> <i class="fa-solid fa-heart font-danger"></i> {{ $list_like->count() }}</span></h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="likes-profile text-center">
                                                    <h3>Comment</h3>
                                                    <h5> <span> <i class="fa-solid fa-comment" style="color: #999;"></i> {{ $list_comment->count() }}</span></h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @foreach ($list_post2 as $post)
                                <div class="card">
                                    <div class="card-body">
                                        <div class="new-users-social">
                                            <div class="d-flex gap-3"><img class="rounded-circle image-radius m-r-15" src="@if($post->user->id === $user_id) {{ asset('assets/images/foto.jpg') }} @else {{ asset('assets/images/foto2.jpg') }} @endif" alt="">
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-0">{{ $post->user->first_name }} {{ $post->user->last_name }}</h6>
                                                    <p>{{ $post->created_at->diffForHumans() }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-5">
                                                <img class="img-fluid" alt="" src="{{ asset($post->image_url) }}">
                                                <div class="timeline-content">
                                                    <p>{{ $post->content }}</p>
                                                    <div class="like-content">
                                                        <h5>

                                                            <span>
                                                                @if($post->liked_by_current_user)
                                                                <form action="{{ url('/unlike') }}" method="POST">
                                                                    @csrf
                                                                    <input hidden name="post_id" value="{{ $post->id }}">
                                                                    <button class="btn btn-transparent" type="submit" id="btn_like{{ $post->id }}">
                                                                        <i class="fas fa-heart" style="color: #ff2600;"></i>
                                                                    </button>
                                                                    <span>{{ $post->like_count }}</span>
                                                                </form>

                                                                @else
                                                                <form action="{{ url('/like') }}" method="POST">
                                                                    @csrf
                                                                    <input hidden name="post_id" value="{{ $post->id }}">
                                                                    <button class="btn btn-transparent" type="submit" id="btn_unlike{{ $post->id }}">
                                                                        <i class="far fa-heart" style="color: #ff2600;"></i>
                                                                    </button>
                                                                    <span>{{ $post->like_count }}</span>
                                                                </form>
                                                                @endif

                                                            </span>
                                                            <span class="pull-right comment-number">
                                                                <span>{{ $post->comments->count() }} </span>
                                                                <span>
                                                                    <i class="fa-solid fa-comment me-0"></i>
                                                                </span>
                                                            </span>
                                                        </h5>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-sm-7">
                                                <div class="timeline-content">
                                                    <div class="social-chat">
                                                        @foreach ($post->comments as $comment)
                                                        <div class="comment @if($comment->user_id === $user_id) your-msg @else other-msg @endif">
                                                            <div class="d-flex gap-3">
                                                                <img class="img-50 img-fluid m-r-20 rounded-circle" src="@if($comment->user_id === $user_id) {{ asset('assets/images/foto.jpg') }} @else {{ asset('assets/images/foto2.jpg') }} @endif" alt="">
                                                                <div class="flex-grow-1">
                                                                    <span class="f-w-700">{{ $comment->user->first_name }} {{ $comment->user->last_name }} <span>{{ $comment->created_at->diffForHumans() }} <i class="fa-solid fa-reply font-primary"></i></span></span>
                                                                    <p>{{ $comment->comment }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                        @if($post->comments->count() <> 0) <div class="text-center" hidden><a href="#">More Commnets</a></div> @endif

                                                    </div>
                                                    <div class="comments-box">
                                                        <div class="d-flex gap-3"><img class="img-50 img-fluid m-r-20 rounded-circle" alt="" src="{{ asset('assets/images/foto.jpg') }}">
                                                            <div class="flex-grow-1">
                                                                <form action="{{ url('/comment') }}" method="POST">
                                                                    @csrf
                                                                    <div class="input-group text-box">
                                                                        <input hidden name="post_id" value="{{ $post->id }}">
                                                                        <input class="form-control input-txt-bx" type="text" name="comment" placeholder="Post Your commnets">
                                                                        <div class="input-group-append">
                                                                            <button class="btn btn-transparent" type="submit"><i class="fas fa-paper-plane"></i></button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 footer-copyright">
                            <p class="mb-0">Copyright 2024 © Admiro theme by pixelstrap.</p>
                        </div>
                        <div class="col-md-6">
                            <p class="float-end mb-0">Hand crafted &amp; made with
                                <svg class="svg-color footer-icon">
                                    <use href="{{ asset('assets/svg/iconly-sprite.svg#heart') }}"></use>
                                </svg>
                            </p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!-- jquery-->
    <script src="{{ asset('assets/js/vendors/jquery/jquery.min.js') }}"></script>
    <!-- bootstrap js-->
    <script src="{{ asset('assets/js/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}" defer=""></script>
    <script src="{{ asset('assets/js/vendors/bootstrap/dist/js/popper.min.js') }}" defer=""></script>
    <!--fontawesome-->
    <script src="{{ asset('assets/js/vendors/font-awesome/fontawesome-min.js') }}"></script>
    <!-- photo_swipe-->
    <script src="{{ asset('assets/js/photoswipe/photoswipe.min.js') }}"></script>
    <script src="{{ asset('assets/js/photoswipe/photoswipe-ui-default.min.js') }}"></script>
    <script src="{{ asset('assets/js/photoswipe/photoswipe.js') }}"></script>
    <!-- theme_customizer-->
    <script src="{{ asset('assets/js/script.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        $(document).ready(function() {
            @if(Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}";
            switch (type) {
                case 'info':
                    toastr["info"]("{{ Session::get('message') }}", "Information");
                    break;

                case 'warning':
                    toastr["warning"]("{{ Session::get('message') }}", "Warning!");
                    break;

                case 'success':
                    toastr["success"]("{{ Session::get('message') }}", "Success");
                    break;

                case 'error':
                    toastr["error"]("{{ Session::get('message') }}", "Error");
                    break;
            }
            @endif
        });
    </script>
</body>

</html>