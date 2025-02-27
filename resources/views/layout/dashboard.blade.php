<!DOCTYPE html>
<html lang="zh-tw">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>@yield('title')二手商鋪</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="/images/logo.png" />
        <link rel="stylesheet" href="/assets/fonts/bootstrap-icons-1.11.3/font/bootstrap-icons.min.css">
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="/css/admin-style.css" rel="stylesheet" />
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light">二手商鋪管理</div>
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="/order/manage"><i class="bi bi-list-ul me-1"></i>訂單管理</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="/merchandise/manage"><i class="bi bi-boxes me-1"></i>商品管理</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="/category/manage"><i class="bi bi-bookmarks me-1"></i>類別管理</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#"><i class="bi bi-megaphone me-1"></i>公告與通知管理</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#"><i class="bi bi-brush me-1"></i>文宣管理</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#"><i class="bi bi-newspaper me-1"></i>新聞管理</a>
                </div>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <div class="container-fluid">
                        <button class="btn btn-outline-dark fs-5" id="sidebarToggle"><i class="bi bi-list"></i></button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                                <li class="nav-item"><a class="nav-link" href="/">回首頁<i class="bi bi-chevron-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- Page content-->
                <div class="container">
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="/assets/bootstrap-5.3.3/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="/js/admin-script.js"></script>
    </body>
</html>
