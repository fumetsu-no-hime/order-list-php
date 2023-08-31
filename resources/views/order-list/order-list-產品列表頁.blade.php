<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order List Dashboard - FreshCart</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/img/favicon.ico')}}">
    <link rel="stylesheet" href="{{asset('./css/css.css')}}">
    <link rel="stylesheet" href="{{asset('./css/bootstrap.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>
    <div class="position-absolute d-xl-block d-none" id="menuL">
        <div
            class="top-title fw-bolder text-center w-100 sticky-top d-flex justify-content-start p-3 align-items-center">
            <a href="https://freshcart.codescandy.com/index.html">
                <div id="menuL-logo"></div>
            </a>
        </div>
        <div class="side-nav w-100 px-3">
            <button class=" text-start px-3 py-3 w-100" type="button"><i class="bi bi-house"></i><span
                    class="ms-3">Dashboards</span></button>


            <div class=" text-start px-3 py-xl-3 menuL-title"><span>Store Managements</span></div>
            <button class=" text-start px-3 py-3 w-100" type="button"><i class="bi bi-cart"></i><span
                    class="ms-3">Products</span></button>
            <button class=" text-start px-3 py-3 w-100" type="button"><i class="bi bi-list-task"></i><span
                    class="ms-3">Categories</span></button>

            <button class=" text-start px-3 py-3 w-100 orders" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarToggleExternalContent5" aria-controls="navbarToggleExternalContent5"
                aria-expanded="false" aria-label="Toggle navigation"><i class="bi bi-bag"></i><span
                    class="ms-3">Orders</span><span class="float-end"><img class="chevron-down" src="./img/下載.svg"
                        width="14" height="22.39" alt=""></span></button>
            <div class="collapse" id="navbarToggleExternalContent5">
                <div class="option-list ps-0 position-relative">
                    <button class=" text-start ps-4 py-2 w-100 position-relative" type="button"><span class="ms-4">
                            <div class="dot"></div>List
                        </span></button>
                    <button class=" text-start ps-4 py-2 w-100 position-relative"><span class="ms-4">
                            <div class="dot"></div>Single
                        </span></button>
                </div>
            </div>

            <button class=" text-start px-3 py-3 w-100" type="button"><i class="bi bi-shop"></i><span
                    class="ms-3">Sellers / Vendors</span></button>

            <button class=" text-start px-3 py-3 w-100" type="button"><i class="bi bi-people"></i><span
                    class="ms-3">Customers</span></button>

            <button class=" text-start px-3 py-3 w-100" type="button"><i class="bi bi-star"></i><span
                    class="ms-3">Reviews</span></button>

            <button class=" text-start px-3 py-3 w-100" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarToggleExternalContent20" aria-controls="navbarToggleExternalContent20"
                aria-expanded="false" aria-label="Toggle navigation" id="MenuLevel"><i
                    class=" bi bi-arrow-90deg-down"></i><span class="ms-3">Menu Level</span><span class="float-end"><img
                        class="chevron-down-1" src="./img/下載.svg" width="14" height="22.39" alt=""></span></button>
            <div class="collapse" id="navbarToggleExternalContent20">
                <div class="option-list ps-0">
                    <button class=" text-start pe-3 ps-4 py-2 w-100 position-relative" type="button"
                        data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent21"
                        aria-controls="navbarToggleExternalContent21" aria-expanded="false"
                        aria-label="Toggle navigation" id="twoLevel"><span class="ms-4">
                            <div class="dot"></div>Two Level
                        </span><span class="float-end"><img class="chevron-down-2" src="./img/下載.svg" width="14"
                                height="22.39" alt=""></span></button>
                    <div class="collapse" id="navbarToggleExternalContent21">
                        <div class="option-list ps-0">
                            <button class=" text-start pe-3 ps-4 py-2 w-100 position-relative"><span class="ms-4">
                                    <div class="dot"></div>NavItem
                                    1
                                </span></button>
                            <button class=" text-start pe-3 ps-4 py-2 w-100 position-relative"><span class="ms-4">
                                    <div class="dot"></div>NavItem
                                    2
                                </span></button>
                        </div>
                    </div>
                    <button class=" text-start pe-3 ps-4 py-2 w-100 position-relative" type="button"
                        data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent22"
                        aria-controls="navbarToggleExternalContent22" aria-expanded="false"
                        aria-label="Toggle navigation" id="threeLevel"><span class="ms-4">
                            <div class="dot"></div>Three Level
                        </span><span class="float-end"><img class="chevron-down-3" src="./img/下載.svg" width="14"
                                height="22.39" alt=""></span></button>
                    <div class="collapse" id="navbarToggleExternalContent22">
                        <div class="option-list ps-0">
                            <button class=" text-start ps-4 pe-3 py-2 w-100 position-relative" type="button"
                                data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent23"
                                aria-controls="navbarToggleExternalContent23" aria-expanded="false"
                                aria-label="Toggle navigation" id="navItem"><span class="ms-4">
                                    <div class="dot"></div>NavItem 1
                                </span><span class="float-end"><img class="chevron-down-4" src="./img/下載.svg" width="14"
                                        height="22.39" alt=""></span></button>
                            <div class="collapse" id="navbarToggleExternalContent23">
                                <div class="option-list ps-4">
                                    <button class=" text-start pe-3 ps-4 py-2 w-100 position-relative"><span
                                            class="ms-3">
                                            <div class="dot"></div>NavChild Item 1
                                        </span></button>
                                    <!-- <div class="pe-3 py-2">NavItem 2</div> -->
                                </div>
                            </div>
                            <button class=" text-start px-4 py-2 w-100 position-relative"><span class="ms-4">
                                    <div class="dot"></div>Nav Item 2
                                </span></button>
                        </div>
                    </div>
                </div>
            </div>

            <div class=" text-start px-3 py-xl-3 menuL-title"><span>Site Settings</span><span
                    class="badge bg-primary-subtle text-primary-emphasis ms-4">Coming Soon</span></div>

            <div class=" text-start px-3 py-3 text-body-tertiary"><i class="bi bi-newspaper"></i><span
                    class="ms-3">Blog</span></div>

            <div class=" text-start px-3 py-3 text-body-tertiary"><i class="bi bi-images"></i><span
                    class="ms-3">Media</span></div>

            <div class=" text-start px-3 py-3 text-body-tertiary"><i class="bi bi-gear"></i><span class="ms-3">Store
                    Settings</span></div>

            <div class=" text-start px-3 py-xl-3 menuL-title"><span>Support</span><span
                    class="badge bg-primary-subtle text-primary-emphasis ms-4">Coming Soon</span></div>

            <div class=" text-start px-3 py-3 text-body-tertiary"><i class="bi bi-headphones"></i><span
                    class="ms-3">Support Ticket
                </span></div>

            <div class=" text-start px-3 py-3 text-body-tertiary"><i class="bi bi-question-circle"></i><span
                    class="ms-3">Help Center
                </span></div>

            <div class=" text-start px-3 py-3 text-body-tertiary"><i class="bi bi-infinity"></i><span class="ms-3">How
                    FreshCart
                    Works</span></div>

            <div class=" text-start px-3 py-xl-3 menuL-title"><span>Our Apps</span></div>


            <div class=" text-start px-3 py-3 text-body-tertiary"><i class="bi bi-apple"></i><span class="ms-3">Apple
                    Store</span></div>


            <div class=" text-start px-3 py-3 mb-4 text-body-tertiary"><i class="bi bi-google-play"></i><span
                    class="ms-3">Google Play Store</span></div>
        </div>
    </div>
    <div class="p-0 position-relative " id="mainPage">
        <nav class="navbar navbar-light p-0 sticky-top d-flex  align-items-center">
            <div class="container-fluid align-items-center">
                <div class="navL d-flex w-50">
                    <button class="navbar-toggler d-xl-none p-0 border-0  burger" type="button"
                        data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                        <span class="ps-4 pe-2"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                fill="currentColor" class="bi bi-text-indent-right" viewBox="0 0 16 16">
                                <path
                                    d="M2 3.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm10.646 2.146a.5.5 0 0 1 .708.708L11.707 8l1.647 1.646a.5.5 0 0 1-.708.708l-2-2a.5.5 0 0 1 0-.708l2-2zM2 6.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z">
                                </path>
                            </svg></span>
                    </button>
                    <form class="d-flex position-relative ms-2">
                        <!-- <span class="mdi mdi-magnify search-icon"></span> -->
                        <input class="form-control rounded-0 w-100" id="search-area" type="search" placeholder="Search"
                            aria-label="Search">
                        <!-- <button class="btn rounded-0" type="submit" id="search">Search</button> -->
                    </form>
                </div>
                <div class="cotainer d-flex justify-content-between align-items-center">
                    <div class="dropdown" id="bell"><button type="button" data-bs-toggle="dropdown"
                            aria-expanded="false"><i class="bi bi-bell fs-5"></i></button>
                        <ul class="dropdown-menu p-0" id="bell-list">
                            <div class="d-flex justify-content-between align-items-center px-4 py-3 border-bottom">
                                <div class="w-75 m-0">
                                    <h5>Notifications</h5>
                                    <p>You have 2 unread messages</p>
                                </div>
                                <a class="dropdown-item w-25 ps-5 pe-0 ms-3 float-end" href="#"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                                        class="bi bi-check2-all text-success" viewBox="0 0 16 16">
                                        <path
                                            d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l7-7zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0z">
                                        </path>
                                        <path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708z"></path>
                                    </svg></a>
                            </div>
                            <div id="bell-list-content">
                                <li class="px-4 py-2">
                                    <div class="d-flex"><img src="./img/avatar-1.jpg" alt="">
                                        <div class="ms-3"><span><span>Your order is placed</span>&nbsp;<span
                                                    class="text-body-secondary">waiting for shipping</span>
                                            </span><br><span><svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                    height="12" fill="currentColor" class="bi bi-clock text-muted"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z">
                                                    </path>
                                                    <path
                                                        d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z">
                                                    </path>
                                                </svg></span><small class="ms-2">1 minute ago</small></div>
                                    </div>
                                </li>
                                <li class="px-4 py-3">
                                    <div class="d-flex"><img src="./img/avatar-2.jpg" alt="">
                                        <div class="ms-3"><span>Jitu Chauhan&nbsp;<span
                                                    class="text-body-secondary">answered to your pending order list with
                                                    notes</span>


                                            </span><br><span><svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                    height="12" fill="currentColor" class="bi bi-clock text-muted"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z">
                                                    </path>
                                                    <path
                                                        d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z">
                                                    </path>
                                                </svg></span><small class="ms-2">2 days ago</small></div>
                                    </div>
                                </li>
                                <li class="px-4 py-3">
                                    <div class="d-flex"><img src="./img/avatar-5.jpg" alt="">
                                        <div class="ms-3"><span>You have new messages &nbsp;<span
                                                    class="text-body-secondary">2 unread messages</span>

                                            </span><br><span><svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                    height="12" fill="currentColor" class="bi bi-clock text-muted"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z">
                                                    </path>
                                                    <path
                                                        d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z">
                                                    </path>
                                                </svg></span><small class="ms-2">1 minute ago</small></div>
                                    </div>
                                </li>
                            </div>

                            <div class="d-flex justify-content-center align-items-center p-3 border-top text-success">
                                <a href="#">View All</a>
                            </div>
                        </ul>
                    </div>
                    <div class="dropdown ms-2"><button type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="logo-pic rounded-circle"></div>
                        </button>
                        <ul class="dropdown-menu p-0" id="logo-list">
                            <div class="p-3 border-bottom">
                                <h6>FreshCart Admin</h6>
                                <p>admindemo@email.com</p>
                            </div>
                            <div class="px-2 py-3">
                                <li><a class="dropdown-item px-2" href="#">Home</a></li>
                                <li><a class="dropdown-item px-2" href="#">Profile</a></li>
                                <li><a class="dropdown-item px-2" href="#">Settings</a></li>
                            </div>
                            <div class="px-3 py-2 border-top text-success text-start"><a href="#">Log Out</a></div>
                        </ul>
                    </div>
                </div>
                <div class="offcanvas offcanvas-start w-25 p-0" tabindex="-1" id="offcanvasNavbar"
                    aria-labelledby="offcanvasNavbarLabel">
                    <div
                        class="top-title fw-bolder text-center w-100 sticky-top d-flex justify-content-between align-items-center py-3 px-3">
                        <div id="menuL-logo-2"></div>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="side-nav-2 w-100 px-3">
                        <button class=" text-start px-3 py-3 w-100" type="button"><i class="bi bi-house"></i><span
                                class="ms-3">Dashboards</span></button>


                        <div class=" text-start px-3 py-3 menuL-title"><span>Store Managements</span></div>
                        <button class=" text-start px-3 py-3 w-100" type="button"><i class="bi bi-cart"></i><span
                                class="ms-3">Products</span></button>
                        <button class=" text-start px-3 py-3 w-100" type="button"><i class="bi bi-list-task"></i><span
                                class="ms-3">Categories</span></button>

                        <button class=" text-start px-3 py-3 w-100 orders-2" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarToggleExternalContent5" aria-controls="navbarToggleExternalContent5"
                            aria-expanded="false" aria-label="Toggle navigation"><i class="bi bi-bag"></i><span
                                class="ms-3">Orders</span><span class="float-end"><img class="chevron-down-5"
                                    src="./img/下載.svg" width="14" height="22.39" alt=""></span></button>
                        <div class="collapse" id="navbarToggleExternalContent5">
                            <div class="option-list ps-0 position-relative">
                                <button class=" text-start ps-4 py-2 w-100 position-relative" type="button"><span
                                        class="ms-4">
                                        <div class="dot"></div>List
                                    </span></button>
                                <button class=" text-start ps-4 py-2 w-100 position-relative"><span class="ms-4">
                                        <div class="dot"></div>Single
                                    </span></button>
                            </div>
                        </div>

                        <button class=" text-start px-3 py-3 w-100" type="button"><i class="bi bi-shop"></i><span
                                class="ms-3">Sellers / Vendors</span></button>

                        <button class=" text-start px-3 py-3 w-100" type="button"><i class="bi bi-people"></i><span
                                class="ms-3">Customers</span></button>

                        <button class=" text-start px-3 py-3 w-100" type="button"><i class="bi bi-star"></i><span
                                class="ms-3">Reviews</span></button>


                        <div class=" text-start px-3 py-3 menuL-title"><span>Site Settings</span><span
                                class="badge bg-primary-subtle text-primary-emphasis ms-4">Coming Soon</span></div>

                        <div class=" text-start px-3 py-3 text-body-tertiary"><i class="bi bi-newspaper"></i><span
                                class="ms-3">Blog</span></div>

                        <div class=" text-start px-3 py-3 text-body-tertiary"><i class="bi bi-images"></i><span
                                class="ms-3">Media</span></div>

                        <div class=" text-start px-3 py-3 text-body-tertiary"><i class="bi bi-gear"></i><span
                                class="ms-3">Store
                                Settings</span></div>

                        <div class=" text-start px-3 py-3 menuL-title"><span>Support</span><span
                                class="badge bg-primary-subtle text-primary-emphasis ms-4">Coming Soon</span></div>

                        <div class=" text-start px-3 py-3 text-body-tertiary"><i class="bi bi-headphones"></i><span
                                class="ms-3">Support Ticket
                            </span></div>

                        <div class=" text-start px-3 py-3 text-body-tertiary"><i class="bi bi-question-circle"></i><span
                                class="ms-3">Help Center
                            </span></div>

                        <div class=" text-start px-3 py-3 text-body-tertiary"><i class="bi bi-infinity"></i><span
                                class="ms-3">How
                                FreshCart
                                Works</span></div>

                        <div class=" text-start px-3 py-3 menuL-title"><span>Our Apps</span></div>


                        <div class=" text-start px-3 py-3 text-body-tertiary"><i class="bi bi-apple"></i><span
                                class="ms-3">Apple
                                Store</span></div>


                        <div class=" text-start px-3 py-3 mb-4 text-body-tertiary"><i
                                class="bi bi-google-play"></i><span class="ms-3">Google Play Store</span></div>
                    </div>
                </div>
            </div>
        </nav>
        <div class="content-page py-4 px-lg-0 px-xl-5 mx-md-5 d-flex flex-column">
            <div class="content-title d-flex justify-content-between align-items-center flex-column px-xxl-5 px-xl-0">
                <div class="title mb-4 px-2 w-100">
                    <h2 class="fw-medium w-50">Order List</h2>
                    <h6><span class="text-Dashboard">Dashboard</span>&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbspOrder
                        List</h6>
                </div>
                <div class="order w-100 mb-5 px-2 ">
                    <div class="card p-0 border-0 o-card">
                        <div
                            class="card-header bg-white d-flex justify-content-between flex-column flex-md-row order-search py-4">
                            <form class="d-flex position-relative">
                                <input class="form-control rounded-0 py-0 w-100" id="search-area" type="search"
                                    placeholder="Search" aria-label="Search">
                                <a href="/order-list-2" class="mx-2 bg-primary-subtle w-50 d-flex align-items-center justify-content-center">新增產品</a>
                            </form>
                            <div class="form-floating pt-3 pt-md-0">
                                <select class="form-select py-0 ps-3 w-100" id="floatingSelect"
                                    aria-label="Floating label select example">
                                    <option selected>Status</option>
                                    <option value="1">Sucess</option>
                                    <option value="2">Pending</option>
                                    <option value="3">cancel</option>
                                </select>
                                <label for="floatingSelect" class="p-0"></label>
                            </div>
                        </div>
                        <div class="card-body order-list p-0">
                            <table
                                class="table table-centered table-hover text-nowrap table-borderless pb-0 mb-0 table-with-checkbox">
                                <thead class="px-2">
                                    <tr class="th1">
                                        <th>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="checkAll"
                                                    onchange="checkedAll(this)">
                                                <label class="form-check-label" for="checkAll">
                                                </label>
                                            </div>
                                        </th>
                                        <th>Image</th>
                                        <th>產品名稱</th>
                                        <th>產品描述</th>
                                        <th>新增日期</th>
                                        <th>顯示</th>
                                        <th>產品價格</th>
                                        <th>功能</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>
                                            <div class="form-check pt-2">
                                                <input class="form-check-input checkbox" type="checkbox" value=""
                                                    id="check1">
                                                <label class="form-check-label" for="check1">
                                                </label>
                                            </div>
                                        </th>
                                        <th><img src="./img/product-img-1.jpg" width="40" height="40" alt=""></th>
                                        <th>FC#1007</th>
                                        <th>Jennifer Sullivan</th>
                                        <th>01 May 2023 (10:12 am)</th>
                                        <th><span class="badge fw-bolder success">Success</span>
                                        </th>
                                        <th>$12.99</th>
                                        <th>
                                            <ul class="p-0 m-0 d-flex flex-column w-100 d-flex flex-column btn-group-sm w-100">
                                                <div class="bg-primary-subtle mb-1 btn"><a
                                                        href="#">Delete</a></div>
                                                <a href="/order-list-3" class="bg-primary-subtle btn btn"><span>Edit</span></a>
                                            </ul>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>
                                            <div class="form-check pt-2">
                                                <input class="form-check-input checkbox" type="checkbox" value=""
                                                    id="check2">
                                                <label class="form-check-label" for="check2">
                                                </label>
                                            </div>
                                        </th>
                                        <th><img src="./img/product-img-2.jpg" width="40" height="40" alt=""></th>
                                        <th>FC#1006</th>
                                        <th>Willie Hanson</th>
                                        <th>20 April 2023 (9:20 am)</th>
                                        <th><span class="badge fw-bolder success">Success</span>
                                        </th>
                                        <th>$8.19</th>
                                        <th>
                                            <ul class="p-0 m-0 d-flex flex-column btn-group-sm w-100">
                                                <button type="button" class="bg-primary-subtle btn mb-1"><a
                                                        href="#">Delete</a></button>
                                                <a href="/order-list-3" class="bg-primary-subtle btn btn"><span>Edit</span></a>
                                            </ul>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>
                                            <div class="form-check pt-2">
                                                <input class="form-check-input checkbox" type="checkbox" value=""
                                                    id="check3">
                                                <label class="form-check-label" for="check3">
                                                </label>
                                            </div>
                                        </th>
                                        <th><img src="./img/product-img-3.jpg" width="40" height="40" alt=""></th>
                                        <th>FC#1005</th>
                                        <th>Dori Stewart</th>
                                        <th>11 March 2023 (7:12 pm)</th>
                                        <th><span class="badge pending">Pending</span>
                                        </th>
                                        <th>$8.19</th>
                                        <th>
                                            <ul class="p-0 m-0 d-flex flex-column btn-group-sm w-100">
                                                <button type="button" class="bg-primary-subtle btn mb-1"><a
                                                        href="#">Delete</a></button>
                                                <a href="/order-list-3" class="bg-primary-subtle btn btn"><span>Edit</span></a>
                                            </ul>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>
                                            <div class="form-check pt-2">
                                                <input class="form-check-input checkbox" type="checkbox" value=""
                                                    id="check4">
                                                <label class="form-check-label" for="check4">
                                                </label>
                                            </div>
                                        </th>
                                        <th><img src="./img/product-img-4.jpg" width="40" height="40" alt=""></th>
                                        <th>FC#1004</th>
                                        <th>Ezekiel Rogerson</th>
                                        <th>09 March 2023 (6:23 pm)</th>
                                        <th><span class="badge fw-bolder success">Success</span>
                                        </th>
                                        <th>$23.11</th>
                                        <th>
                                            <ul class="p-0 m-0 d-flex flex-column btn-group-sm w-100">
                                                <button type="button" class="bg-primary-subtle btn mb-1"><a
                                                        href="#">Delete</a></button>
                                                <a href="/order-list-3" class="bg-primary-subtle btn btn"><span>Edit</span></a>
                                            </ul>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>
                                            <div class="form-check pt-2">
                                                <input class="form-check-input checkbox" type="checkbox" value=""
                                                    id="check5">
                                                <label class="form-check-label" for="check5">
                                                </label>
                                            </div>
                                        </th>
                                        <th><img src="./img/product-img-5.jpg" width="40" height="40" alt=""></th>
                                        <th>FC#1003</th>
                                        <th>Maria Roux</th>
                                        <th>18 Feb 2022 (12:20 pm)</th>
                                        <th><span class="badge fw-bolder success">Success</span>
                                        </th>
                                        <th>$2.00</th>
                                        <th>
                                            <ul class="p-0 m-0 d-flex flex-column btn-group-sm w-100">
                                                <button type="button" class="bg-primary-subtle btn mb-1"><a
                                                        href="#">Delete</a></button>
                                                <a href="/order-list-3" class="bg-primary-subtle btn btn"><span>Edit</span></a>
                                            </ul>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th class="checkbox">
                                            <div class="form-check pt-2">
                                                <input class="form-check-input checkbox" type="checkbox" value=""
                                                    id="check6">
                                                <label class="form-check-label" for="check6">
                                                </label>
                                            </div>
                                        </th>
                                        <th><img src="./img/product-img-6.jpg" width="40" height="40" alt=""></th>
                                        <th>FC#1002</th>
                                        <th>Robert Donald</th>
                                        <th>12 Feb 2022 (4:56 pm)</th>
                                        <th><span class="badge cancel">Cancel</span>
                                        </th>
                                        <th>$56.00</th>
                                        <th>
                                            <ul class="p-0 m-0 d-flex flex-column btn-group-sm w-100">
                                                <button type="button" class="bg-primary-subtle btn mb-1"><a
                                                        href="#">Delete</a></button>
                                                <a href="/order-list-3" class="bg-primary-subtle btn btn"><span>Edit</span></a>
                                            </ul>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>
                                            <div class="form-check pt-2">
                                                <input class="form-check-input checkbox" type="checkbox" value=""
                                                    id="check7">
                                                <label class="form-check-label" for="check7">
                                                </label>
                                            </div>
                                        </th>
                                        <th><img src="./img/product-img-7.jpg" width="40" height="40" alt=""></th>
                                        <th>FC#1001</th>
                                        <th>Diann Watson</th>
                                        <th>22 Jan 2023 (1:20 pm)</th>
                                        <th><span class="badge success">Success</span>
                                        </th>
                                        <th>$23.00</th>
                                        <th>
                                            <ul class="p-0 m-0 d-flex flex-column btn-group-sm w-100 ">
                                                <button type="button" class="bg-primary-subtle btn mb-1"><a
                                                        href="#">Delete</a></button>
                                                <a href="/order-list-3" class="bg-primary-subtle btn btn"><span>Edit</span></a>
                                            </ul>
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div
                            class="card-footer order-page bg-white px-3 d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between">
                            <div>Showing 1 to 8 of 12 entries</div>
                            <div aria-label="Page navigation">
                                <ul class="pagination justify-content-end mt-3" id="page-item">
                                    <li class="page-item disabled me-1">
                                        <a class="page-link">Previous</a>
                                    </li>
                                    <li class="page-item me-1"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item me-1"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item me-1"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="{{asset('./js/bootstrap.bundle.js')}}"></script>
    <script src="{{asset('./js/js.js')}}"></script>
</body>

</html>
