<div id="left-sidebar" class="sidebar">
    <div class="sidebar-scroll">
        <div class="user-account">
            <img src="{{asset(auth('admin')->user()->photo)}}" class="rounded-circle user-photo" alt="User Profile Picture">
            <div class="dropdown">
                <span>Welcome,</span>
                <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong>{{ucfirst(auth('admin')->user()->full_name)}}</strong></a>
                <ul class="dropdown-menu dropdown-menu-right account">
                    <li><a href="page-profile2.html"><i class="icon-user"></i>My Profile</a></li>
                    <li><a href="app-inbox.html"><i class="icon-envelope-open"></i>Messages</a></li>
                    <li><a href="javascript:void(0);"><i class="icon-settings"></i>Settings</a></li>
                    <li class="divider"></li>
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">

                        <i class="icon-power"></i>Logout</a>
                        </a>
                    </li>
                </ul>
            </div>
            <hr>
            <ul class="row list-unstyled">
                <li class="col-4">
                    <small>Sales</small>
                    <h6>456</h6>
                </li>
                <li class="col-4">
                    <small>Order</small>
                    <h6>1350</h6>
                </li>
                <li class="col-4">
                    <small>Revenue</small>
                    <h6>$2.13B</h6>
                </li>
            </ul>
        </div>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs">
            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#menu">Menu</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Chat"><i class="icon-book-open"></i></a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#setting"><i class="icon-settings"></i></a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#question"><i class="icon-question"></i></a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content p-l-0 p-r-0">
            <div class="tab-pane active" id="menu">
                <nav id="left-sidebar-nav" class="sidebar-nav">
                    <ul id="main-menu" class="metismenu">
                        <li class="active"><a href="{{route('admin')}}"><i class="icon-speedometer"></i> <span>Dashboard</span></a>
                        <li class="desactive">
                            <a href="javascript:void(0);" class="has-arrow"><i class="icon-picture"></i> <span>Banner Management</span></a>
                            <ul>
                                <li><a href="{{route('banner.index')}}">All Banners</a></li>
                                <li><a href="{{route('banner.create')}}">Add Banner</a></li>
                            </ul>
                        </li>
                        <li class="desactive">
                            <a href="javascript:void(0);" class="has-arrow"><i class="icon-grid"></i> <span>Category Management</span></a>
                            <ul>
                                <li><a href="{{route('category.index')}}">All Categories</a></li>
                                <li><a href="{{route('category.create')}}">Add Category</a></li>
                            </ul>
                        </li>
                        <li class="desactive">
                            <a href="javascript:void(0);" class="has-arrow"><i class="icon-handbag"></i> <span>Brand Management</span></a>
                            <ul>
                                <li><a href="{{route('brand.index')}}">All Brands</a></li>
                                <li><a href="{{route('brand.create')}}">Add Brand</a></li>
                            </ul>
                        </li>
                        <li class="desactive">
                            <a href="javascript:void(0);" class="has-arrow"><i class="icon-briefcase"></i> <span>Products Managements</span></a>
                            <ul>
                                <li><a href="{{route('product.index')}}">All Products</a></li>
                                <li><a href="{{route('product.create')}}">Add Product</a></li>
                            </ul>
                        </li>
                        <li class="desactive">
                            <a href="javascript:void(0);" class="has-arrow"><i class="icon-directions"></i> <span>Shipping Managements</span></a>
                            <ul>
                                <li><a href="{{route('shipping.index')}}">Shipping's</a></li>
                                <li><a href="{{route('shipping.create')}}">Add Shipping</a></li>
                            </ul>
                        </li>
                        <li class="desactive">
                            <a href="javascript:void(0);" class="has-arrow"><i class="fa fa-money"></i> <span>Currency Managements</span></a>
                            <ul>
                                <li><a href="{{route('currency.index')}}">Currencies</a></li>
                                <li><a href="{{route('currency.create')}}">Add Currency</a></li>
                            </ul>
                        </li>
                        <li class="desactive">
                            <a href="{{route('order.index')}}" class="has-arrow"><i class="icon-layers"></i> <span>Order Managements</span></a>
                        </li>
                        <li class="desactive">
                            <a href="javascript:void(0);" class="has-arrow"><i class="icon-vector"></i> <span>Post Category</span></a>
                            <ul>
                                {{-- <li><a href="{{route('post-category.index')}}">All Post Categories</a></li>
                                <li><a href="{{route('post-category.create')}}">Add Post Category</a></li> --}}
                            </ul>
                        </li>

                        <li class="desactive">
                            <a href="javascript:void(0);" class="has-arrow"><i class="icon-users"></i> <span>Seller Management</span></a>
                            <ul>
                                <li><a href="{{route('seller.index')}}">All Seller</a></li>
                                {{-- <li><a href="{{route('post-tag.create')}}">Add Post Tag</a></li> --}}
                            </ul>
                        </li>
                        <li class="desactive">
                            <a href="javascript:void(0);" class="has-arrow"><i class="icon-tag"></i> <span>Post Tag</span></a>
                            <ul>
                                {{-- <li><a href="{{route('post-tag.index')}}">All Post Tags</a></li>
                                <li><a href="{{route('post-tag.create')}}">Add Post Tag</a></li> --}}
                            </ul>
                        </li>
                        <li class="desactive">
                            <a href="javascript:void(0);" class="has-arrow"><i class="icon-paper-clip"></i> <span>Post Management</span></a>
                            <ul>
                                {{-- <li><a href="{{route('post.index')}}">All Post Managements</a></li>
                                <li><a href="{{route('post.create')}}">Add Post Management</a></li> --}}
                            </ul>
                        </li>
                        <li class="desactive">
                            <a href="javascript:void(0);" class="has-arrow"><i class="icon-star"></i> <span>Review Management</span></a>
                            <ul>
                                {{-- <li><a href="{{route('review.index')}}">All Reviews</a></li>
                                <li><a href="{{route('review.create')}}">Add Review</a></li> --}}
                            </ul>
                        </li>
                        <li class="desactive">
                            <a href="javascript:void(0);" class="has-arrow"><i class="icon-check"></i> <span>Coupon Management</span></a>
                            <ul>
                                <li><a href="{{route('coupon.index')}}">All Coupons</a></li>
                                <li><a href="{{route('coupon.create')}}">Add Coupon</a></li>
                            </ul>
                        </li>
                        <li class="desactive">
                            <a href="javascript:void(0);" class="has-arrow"><i class="icon-user"></i> <span>User Management</span></a>
                            <ul>
                                <li><a href="{{route('user.index')}}">Users</a></li>
                                <li><a href="{{route('user.create')}}">Add User</a></li>
                            </ul>
                        </li>
                        <li class="desactive">
                            <a href="javascript:void(0);" class="has-arrow"><i class="icon-bubbles"></i> <span>Comment Management</span></a>
                            <ul>
                                {{-- <li><a href="{{route('comment.index')}}">All Comments</a></li>
                                <li><a href="{{route('comment.create')}}">Add Comment</a></li> --}}
                            </ul>
                        </li>
                        <li class="desactive"><a href="{{route('about.index')}}"><i class="icon-user-following"></i> <span>About Us</span></a>
                        {{-- <li class="desactive"><a href="{{route('settings')}}"><i class="icon-settings"></i>Settings</a></li> --}}
						<li class="desactive">
                            <a href="javascript:void(0);" class="has-arrow"><i class="icon-settings"></i> <span>General Settings</span></a>
                            <ul>
                                <li><a href="{{route('settings')}}">Settings</a></li>
                                <li><a href="{{route('smtp.index')}}">SMTP Settings</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="tab-pane p-l-15 p-r-15" id="Chat">
                <form>
                    <div class="input-group m-b-20">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-magnifier"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Search...">
                    </div>
                </form>
                <ul class="right_chat list-unstyled">
                    <li class="online">
                        <a href="javascript:void(0);">
                            <div class="media">
                                <img class="media-object " src="{{asset('backend/assets/images/xs/avatar4.jpg')}}" alt="">
                                <div class="media-body">
                                    <span class="name">Chris Fox</span>
                                    <span class="message">Designer, Blogger</span>
                                    <span class="badge badge-outline status"></span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="online">
                        <a href="javascript:void(0);">
                            <div class="media">
                                <img class="media-object " src="{{asset('backend/assets/images/xs/avatar5.jpg')}}" alt="">
                                <div class="media-body">
                                    <span class="name">Joge Lucky</span>
                                    <span class="message">Java Developer</span>
                                    <span class="badge badge-outline status"></span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="offline">
                        <a href="javascript:void(0);">
                            <div class="media">
                                <img class="media-object " src="{{asset('backend/assets/images/xs/avatar2.jpg')}}" alt="">
                                <div class="media-body">
                                    <span class="name">Isabella</span>
                                    <span class="message">CEO, Thememakker</span>
                                    <span class="badge badge-outline status"></span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="offline">
                        <a href="javascript:void(0);">
                            <div class="media">
                                <img class="media-object " src="{{asset('backend/assets/images/xs/avatar1.jpg')}}" alt="">
                                <div class="media-body">
                                    <span class="name">Folisise Chosielie</span>
                                    <span class="message">Art director, Movie Cut</span>
                                    <span class="badge badge-outline status"></span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="online">
                        <a href="javascript:void(0);">
                            <div class="media">
                                <img class="media-object " src="{{asset('backend/assets/images/xs/avatar3.jpg')}}" alt="">
                                <div class="media-body">
                                    <span class="name">Alexander</span>
                                    <span class="message">Writter, Mag Editor</span>
                                    <span class="badge badge-outline status"></span>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="tab-pane p-l-15 p-r-15" id="setting">
                <h6>Choose Skin</h6>
                <ul class="choose-skin list-unstyled">
                    <li data-theme="purple">
                        <div class="purple"></div>
                        <span>Purple</span>
                    </li>
                    <li data-theme="blue">
                        <div class="blue"></div>
                        <span>Blue</span>
                    </li>
                    <li data-theme="cyan" class="active">
                        <div class="cyan"></div>
                        <span>Cyan</span>
                    </li>
                    <li data-theme="green">
                        <div class="green"></div>
                        <span>Green</span>
                    </li>
                    <li data-theme="orange">
                        <div class="orange"></div>
                        <span>Orange</span>
                    </li>
                    <li data-theme="blush">
                        <div class="blush"></div>
                        <span>Blush</span>
                    </li>
                </ul>
                <hr>
                <h6>General Settings</h6>
                <ul class="setting-list list-unstyled">
                    <li>
                        <label class="fancy-checkbox">
                            <input type="checkbox" name="checkbox">
                            <span>Report Panel Usag</span>
                        </label>
                    </li>
                    <li>
                        <label class="fancy-checkbox">
                            <input type="checkbox" name="checkbox" checked>
                            <span>Email Redirect</span>
                        </label>
                    </li>
                    <li>
                        <label class="fancy-checkbox">
                            <input type="checkbox" name="checkbox" checked>
                            <span>Notifications</span>
                        </label>
                    </li>
                    <li>
                        <label class="fancy-checkbox">
                            <input type="checkbox" name="checkbox">
                            <span>Auto Updates</span>
                        </label>
                    </li>
                    <li>
                        <label class="fancy-checkbox">
                            <input type="checkbox" name="checkbox">
                            <span>Offline</span>
                        </label>
                    </li>
                    <li>
                        <label class="fancy-checkbox">
                            <input type="checkbox" name="checkbox">
                            <span>Location Permission</span>
                        </label>
                    </li>
                </ul>
            </div>
            <div class="tab-pane p-l-15 p-r-15" id="question">
                <form>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-magnifier"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Search...">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
