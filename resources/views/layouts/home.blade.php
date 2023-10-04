<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" id="css-main" href="{{ asset('assets/css/dashmix.min.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.31/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}">
    <!-- Scripts -->
    @vite(['resources/css/frontend/home.css', 'resources/js/frontend/home.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-3 shadow-lg p-2">
        <div class="container">
            <a class="navbar-brand" href="index.html"><img src="{{ asset('storage/i.imgur.com/mVAJlQY.png') }}"
                    style="width: 150px; height: 40px"></a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse"
                data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html"><i class="fa fa-home"></i> Trang chủ <span
                                class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://www.facebook.com/kythuat.anori"><i class="fa fa-code"></i>
                            FANPAGE ANORI.VN</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://www.facebook.com/hoang.an.ytb"><i
                                class="fab fa-facebook-square"></i> FB Admin</span></a>
                    <li class="nav-item">
                        <a class="nav-link" href="https://zalo.me/0983699291"><i class="fas fa-comment"></i> Zalo
                            Admin</span></a>
                    <li class="nav-item">
                        <a class="nav-link" href="Nap-Tien.html"><i class='fa fa-id-card' style='font-size:17px'></i>
                            Nạp Tiền</span></a>


                    </li>

                </ul>
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModalLong"><i
                                class="fa fa-language"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="btnFullscreen"><i class="fa fa-expand"></i></a>
                    </li>

                    <div class="mb-4"></div>
                    <div class="float-right">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false" menu-data="account"><i
                                    class="fa fa-user-circle"></i> Đăng Ký/ Đăng Nhập
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownId">
                                <a class="dropdown-item" menu-data="account" href="dang-nhap.html"><i
                                        class="fa fa-sign-in-alt"></i> Đăng nhập</a>
                                <a class="dropdown-item" menu-data="account" href="dang-ky.html"><i
                                        class="fa fa-user-plus"></i> Đăng kí</a>
                            </div>
                    </div>
            </div>
        </div>
    </nav>
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Thay đổi ngôn ngữ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <center id="translate_select"></center>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container mb-5">
        @yield('content')
    </div>

    <div class="snowflakes" aria-hidden="true">
        <div class="snowflake">❅</div>
        <div class="snowflake">❆</div>
        <div class="snowflake">❅</div>
        <div class="snowflake">❆</div>
        <div class="snowflake">❅</div>
        <div class="snowflake">❆</div>
        <div class="snowflake">❅</div>
        <div class="snowflake">❆</div>
        <div class="snowflake">❅</div>
        <div class="snowflake">❆</div>
        <div class="snowflake">❅</div>
        <div class="snowflake">❆</div>
    </div>
    <footer class="c-layout-footer c-layout-footer-3 bg-dark py-3" style="max-width: 100%;">
        <div class="c-prefooter">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="c-container c-first">
                            <a href="http://www.dmca.com/Protection/Status.aspx?ID=ab25dfbc-d64c-43a4-9eb9-0603bce3e676"
                                title="DMCA.com Protection Status" class="dmca-badge"> <img
                                    src="../images.dmca.com/Badges/dmca-badge-w150-5x1-069b76.png?ID=ab25dfbc-d64c-43a4-9eb9-0603bce3e676"
                                    alt="DMCA.com Protection Status" /></a>
                            <script src="../images.dmca.com/Badges/DMCABadgeHelper.min.js"></script>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="c-container c-last">


                            <h2><span style="font-size:22px"><span style="color:#ffffff"><strong>CHÚNG TÔI Ở
                                            ĐÂY</strong></span></span></h2>
                            <h3><span style="color:#bdc3c7"><span style="font-size:16px">Cảm ơn bạn đã tin tưởng dịch
                                        vụ của chúng tôi . Website của chúng tôi an toàn , uy tín chất lượng <br> Quản
                                        trị viên : An Ori IT</span></span></h3><br><br>




                        </div>
                    </div>
                    <div class="col-md-4">

                        <ul class="list-group">

                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Thành Viên<span class="badge badge-primary badge-pill">14.339 Thành Viên</span>
                            </li>


                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Số Code Hiện Có<span class="badge badge-primary badge-pill">259 CODE</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Tổng Code Đã Bán <span class="badge badge-primary badge-pill">45.575 CODE</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Tổng Web Đã Tạo <span class="badge badge-primary badge-pill">743 WEB</span>
                            </li>
                        </ul>


                    </div>
                </div>
            </div>
        </div>
    </footer>

    <a href="https://zalo.me/0983699291" id="linkzalo" target="_blank" rel="noopener noreferrer">
        <div id="fcta-zalo-tracking" class="fcta-zalo-mess">
            <span id="fcta-zalo-tracking">Chat hỗ trợ</span>
        </div>
        <div class="fcta-zalo-vi-tri-nut">
            <div id="fcta-zalo-tracking" class="fcta-zalo-nen-nut">
                <div id="fcta-zalo-tracking" class="fcta-zalo-ben-trong-nut"> <svg id="Layer_1"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 460.1 436.6" width="35" height="55">
                        <path fill="currentColor" class="st0"
                            d="M82.6 380.9c-1.8-.8-3.1-1.7-1-3.5 1.3-1 2.7-1.9 4.1-2.8 13.1-8.5 25.4-17.8 33.5-31.5 6.8-11.4 5.7-18.1-2.8-26.5C69 269.2 48.2 212.5 58.6 145.5 64.5 107.7 81.8 75 107 46.6c15.2-17.2 33.3-31.1 53.1-42.7 1.2-.7 2.9-.9 3.1-2.7-.4-1-1.1-.7-1.7-.7-33.7 0-67.4-.7-101 .2C28.3 1.7.5 26.6.6 62.3c.2 104.3 0 208.6 0 313 0 32.4 24.7 59.5 57 60.7 27.3 1.1 54.6.2 82 .1 2 .1 4 .2 6 .2H290c36 0 72 .2 108 0 33.4 0 60.5-27 60.5-60.3v-.6-58.5c0-1.4.5-2.9-.4-4.4-1.8.1-2.5 1.6-3.5 2.6-19.4 19.5-42.3 35.2-67.4 46.3-61.5 27.1-124.1 29-187.6 7.2-5.5-2-11.5-2.2-17.2-.8-8.4 2.1-16.7 4.6-25 7.1-24.4 7.6-49.3 11-74.8 6zm72.5-168.5c1.7-2.2 2.6-3.5 3.6-4.8 13.1-16.6 26.2-33.2 39.3-49.9 3.8-4.8 7.6-9.7 10-15.5 2.8-6.6-.2-12.8-7-15.2-3-.9-6.2-1.3-9.4-1.1-17.8-.1-35.7-.1-53.5 0-2.5 0-5 .3-7.4.9-5.6 1.4-9 7.1-7.6 12.8 1 3.8 4 6.8 7.8 7.7 2.4.6 4.9.9 7.4.8 10.8.1 21.7 0 32.5.1 1.2 0 2.7-.8 3.6 1-.9 1.2-1.8 2.4-2.7 3.5-15.5 19.6-30.9 39.3-46.4 58.9-3.8 4.9-5.8 10.3-3 16.3s8.5 7.1 14.3 7.5c4.6.3 9.3.1 14 .1 16.2 0 32.3.1 48.5-.1 8.6-.1 13.2-5.3 12.3-13.3-.7-6.3-5-9.6-13-9.7-14.1-.1-28.2 0-43.3 0zm116-52.6c-12.5-10.9-26.3-11.6-39.8-3.6-16.4 9.6-22.4 25.3-20.4 43.5 1.9 17 9.3 30.9 27.1 36.6 11.1 3.6 21.4 2.3 30.5-5.1 2.4-1.9 3.1-1.5 4.8.6 3.3 4.2 9 5.8 14 3.9 5-1.5 8.3-6.1 8.3-11.3.1-20 .2-40 0-60-.1-8-7.6-13.1-15.4-11.5-4.3.9-6.7 3.8-9.1 6.9zm69.3 37.1c-.4 25 20.3 43.9 46.3 41.3 23.9-2.4 39.4-20.3 38.6-45.6-.8-25-19.4-42.1-44.9-41.3-23.9.7-40.8 19.9-40 45.6zm-8.8-19.9c0-15.7.1-31.3 0-47 0-8-5.1-13-12.7-12.9-7.4.1-12.3 5.1-12.4 12.8-.1 4.7 0 9.3 0 14v79.5c0 6.2 3.8 11.6 8.8 12.9 6.9 1.9 14-2.2 15.8-9.1.3-1.2.5-2.4.4-3.7.2-15.5.1-31 .1-46.5z">
                        </path>
                    </svg></div>
                <div id="fcta-zalo-tracking" class="fcta-zalo-text">Chat ngay</div>
            </div>
        </div>
    </a>
    <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/page.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/js/app3769.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.31/dist/sweetalert2.all.min.js"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.bootstrap4.min.js') }}"></script>
    @livewireScripts
</body>

</html>
