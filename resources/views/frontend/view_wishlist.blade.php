@extends('frontend.layouts.app')

@section('content')

    <section class="gry-bg py-4 profile">
        <div class="container">
            <div class="row cols-xs-space cols-sm-space cols-md-space">
                
                <div class="col-lg-9">
                    <div class="main-content">
                        <!-- Page title -->
                        <div class="page-title">
                            <div class="row align-items-center">
                                <div class="col-md-6 col-12">
                                    <h2 class="heading heading-6 text-capitalize strong-600 mb-0">
                                        {{__('Wishlist')}}
                                    </h2>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="float-md-right">
                                        <ul class="breadcrumb">
                                            <li><a href="{{ route('home') }}">{{__('Home')}}</a></li>
                                            <li><a href="{{ route('dashboard') }}">{{__('Dashboard')}}</a></li>
                                            <li class="active"><a href="{{ route('wishlists.index') }}">{{__('Wishlist')}}</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Wishlist items -->

                        <div class="row shop-default-wrapper shop-cards-wrapper shop-tech-wrapper mt-4">

                            <ul id="wishlist-list"></ul>
                        </div>

                     


                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="addToCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-zoom product-modal" id="modal-size" role="document">
            <div class="modal-content position-relative">
                <div class="c-preloader">
                    <i class="fa fa-spin fa-spinner"></i>
                </div>
                <button type="button" class="close absolute-close-btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div id="addToCart-modal-body">

                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script type="text/javascript">
        function removeFromWishlist(id){
            $.post('{{ route('wishlists.remove') }}',{_token:'{{ csrf_token() }}', id:id}, function(data){
                $('#wishlist').html(data);
                $('#wishlist_'+id).hide();
                showFrontendAlert('success', 'Item has been renoved from wishlist');
            })
        }
        function displayWishlist() {
            let storedWishlist = localStorage.getItem('wishlist');
            let wishlist = storedWishlist || [];

            let wishlistList = document.getElementById('wishlist-list');
            wishlistList.innerHTML = '';

            $.post('san-pham-wishlist', {_token: '{{ @csrf_token() }}',productIds: wishlist }, function(response) {
                if (response.success) {
                    $('#wishlist').html(data);
                    } else {
                        console.error('Có lỗi xảy ra:', response.error);
                    }
                })
            .fail(function() {
                console.error('Lỗi khi gửi yêu cầu');
            });

            // wishlist.forEach(productId  => {
            //     let li = document.createElement('li');
                
            //     $.ajax({
            //         url: 'sanpham/'+productId, // Đường dẫn đến API trả về chi tiết sản phẩm
            //         type: 'GET', // Phương thức HTTP (GET, POST, PUT, DELETE)
            //         data: { id: productId }, // Dữ liệu gửi kèm theo yêu cầu (ví dụ: ID sản phẩm)
            //         success: function(data) {
            //             li.textContent = data;
            //             // Xử lý dữ liệu nhận được từ server
            //             // console.log(data);
            //             // Hiển thị chi tiết sản phẩm lên giao diện
            //         },
            //         error: function(error) {
            //             console.error(error);
            //         }
            //     });
               
            //     wishlistList.appendChild(li);
            // });
        }
        // displayWishlist();
    </script>
@endsection
