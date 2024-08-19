@extends('frontend.layouts.app')

@section('content')

<section class="page">
    <div class="container">
        <div class="pg_page padding-top-15">
            <div class="row">
                <div class="col-12">
                    <div class="page-title category-title">
                        <h1 class="title-head d-none"><a href="#">Giới thiệu</a></h1>
                    </div>
                    <div class="content-page rte">
                        <p><strong>Giới thiệu</strong></p>
                        {{-- <article>
                            <h1>Làng nghề truyền thống làm chổi đót Thạnh Hoà - Quảng Nam</h1>

                            <p>
                                <strong>Chổi</strong> là vật dụng quen thuộc mà hầu như gia đình nào cũng có để vệ sinh nhà cửa, sân vườn. Đằng sau những chiếc chổi đót đơn giản ấy là những câu chuyện về <strong>nét văn hoá của một làng nghề</strong>, <strong>vươn lên thoát nghèo</strong> bằng nghề ông cha để lại.
                            </p>
                            
                            <p>
                                Theo các cụ cao niên trong làng, <strong>nghề làm chổi</strong> đã xuất hiện ở <strong>Thôn Thạnh Hoà, xã Quế Xuân I, tỉnh Quảng Nam</strong> từ lâu và gắn bó máu thịt với bà con nơi này, là một <strong>sản phẩm truyền thống nổi tiếng</strong> được làm từ <strong>đót</strong>, một loại cây có sợi dài và bền.
                            </p>
                            
                            <p>
                                Nghề làm chổi đót tại Thôn Thạnh Hoà là <strong>nghề phụ những lúc nhàn rỗi</strong>, cứ xong xuôi việc đồng áng thì bà con lại bắt tay vào làm chổi để bán. Nghề làm chổi đót ở đây <strong>không chỉ người lớn mới làm được mà trẻ em cũng biết làm</strong>, nhất là vào thời gian nghỉ hè, các em tranh thủ giúp cha mẹ để có thêm thu nhập.
                            </p>
                            
                            <p>
                                Cách làm chổi đót không khó, ai cũng có thể làm được, tuy nhiên để có được một cây chổi đót <strong>vừa bền, chắc và đẹp</strong> thì cần phải có <strong>đôi bàn tay khéo léo, tỉ mỉ</strong>. Những chiếc chổi làm ra không chỉ đạt tiêu chuẩn đều, chắc mà còn đáp ứng được nhu cầu của người dùng về thẩm mỹ.
                            </p>
                            
                            <p>
                                Nghề làm chổi đót là <strong>niềm tự hào</strong> của không ít người dân, bởi nó là <strong>cứu cánh giúp họ vượt qua biết bao khó khăn</strong>, nhiều gia đình trong xã nhờ làm chổi đót mà có cái ăn, có tiền cho con ăn học tử tế, thành tài.
                            </p>
                            
                            <p>
                                Để "cứu sống" nghề sản xuất chổi đót ở Thạnh Hoà, <strong>chính quyền địa phương kêu gọi, vận động bà con địa phương liên kết</strong> với nhau trong sản xuất và tìm kiếm thị trường tiêu thụ sản phẩm. Từ đó, <strong>Tổ hợp tác sản xuất chổi đót Thạnh Hoà</strong> ra đời lấy tên đăng ký kinh doanh là Hộ kinh doanh Phạm Thị Trúc.
                            </p>
                            
                            <p>
                                Hiện nay, Tổ hợp tác bên cạnh sản phẩm chủ lực truyền thống là <strong>chổi đót bện mây</strong> thì phát triển thêm một số loại chổi đót mới như <strong>chổi đót cán nhựa, chổi đót quấn dây cước</strong>, để đáp ứng nhu cầu, thị hiếu của người tiêu dùng. <strong>Chổi đót Thạnh Hoà</strong> được biết đến là <strong>sản phẩm chổi đót chất lượng</strong>, được làm từ đôi bàn tay khéo léo và lành nghề của chính người dân địa phương.
                            </p>
                        </article> --}}
                        <div class="cauchuyensp">
                            <div class="row">
                               
                                <div class="col-md-7 col-12">
                                    <h2>"LÀNG NGHỀ TRUYỀN THỐNG THẠNH HOÀ"</h2>
                                    <p>Nghề làm chổi đót tại Thôn Thạnh Hoà là nghề phụ những lúc nhàn rỗi, cứ xong xuôi việc đồng áng thì bà con lại bắt tay vào làm chổi để bán. Nghề làm chổi đót ở đây không chỉ người lớn mới làm được mà trẻ em cũng biết làm, nhất là vào thời gian nghỉ hè, các em tranh thủ giúp cha mẹ để có thêm thu nhập. Cách làm chổi đót không khó, ai cũng có thể làm được, tuy nhiên để có được một cây chổi đót vừa bền, chắc và đẹp thì cần phải có đôi bàn tay khéo léo, tỉ mỉ. Những chiếc chổi làm ra không chỉ đạt tiêu chuẩn đều, chắc mà còn đáp ứng được nhu cầu của người dùng về thẩm mỹ. Bởi vậy mà ở tất cả các công đoạn như tạo đon, bó đon, xâu đót,… yêu cầu người thợ luôn phải có sự tập trung, cẩn thận và khéo léo.</p>
                                </div>
                                <div class="col-md-5 col-12">
                                    <img src="{{asset('uploads/lang_nghe_truyen_thong.webp')}}" alt="Nỗ lực sản xuất chổi đót" srcset="">
                                </div>
                            </div>
                        </div>
                        <div class="cauchuyensp">
                            <div class="row">
                                <div class="col-md-5 col-12">
                                    <img src="{{asset('uploads/noluc.webp')}}" alt="Nỗ lực sản xuất chổi đót" srcset="">
                                </div>
                                <div class="col-md-7 col-12">
                                    <h2>"NỔ LỰC"</h2>
                                    <h3>Từ Chính quyền & Tổ hợp tác Chổi đót Thạnh Hoà</h3>
                                    <p>Để "cứu sống" nghề sản xuất chổi đót ở Thạnh Hoà, chính quyền địa phương kêu gọi, vận động bà con địa phương liên kết với nhau trong sản xuất và tìm kiếm thị trường tiêu thụ sản phẩm, giúp ổn định và tăng quy mô sản xuất cũng như đầu ra cho sản phẩm bà con. <b>Từ đó, Tổ hợp tác sản xuất chổi đót Thạnh Hoà ra đời lấy tên đăng ký kinh doanh là Hộ kinh doanh Phạm Thị Trúc</b>. Tổ hợp tác chổi đót Thạnh Hoà được thành lập nhằm tổ chức sản xuất chổi đót một cách hiệu quả hơn cho các hộ gia đình. Nhờ vào việc hợp tác này, các thành viên trong tổ hợp có thể chia sẻ kinh nghiệm và nguồn lực, từ đó nâng cao chất lượng sản phẩm và tăng khả năng tiêu thụ.</p>
                                </div>
                            </div>
                        </div>

                        <div class="cauchuyensp">
                            <div class="row">
                                
                                <div class="col-md-7 col-12">
                                    <h2>"ĐỊNH HƯỚNG PHÁT TRIỂN"</h2>
                                    <p>
                                        Hiện nay, Tổ hợp tác bên cạnh sản phẩm chủ lực truyền thống là chổi đót bện mây thì phát triển thêm một số loại chổi đót mới như chổi đót cán nhựa, chổi đót quấn dây cuộc,... để đáp ứng nhu cầu, thị hiếu của người tiêu dùng. Chổi đót Thạnh Hoà được biết đến là sản phẩm chổi đót chất lượng, được làm từ đôi bàn tay khéo léo và tinh nghề của chính người dân địa phương. Vì thế, ngoài tiêu thụ trong tỉnh, chổi đót Thạnh Hoà còn cung cấp một số lượng lớn sản phẩm ra thị trường ngoài tỉnh từ đó đã giải quyết việc làm cho không ít người lao động tại địa phương, góp phần phát triển kinh tế xã nhà.
                                    </p>
                                    <h3 class="text-center" style="font-size:1.5rem;font-weight:800">
                                        HỘ KINH DOANH PHẠM THỊ TRÚC
                                        <br>
                                        (TỔ HỢP TÁC XÃ SẢN XUẤT CHỔI ĐÓT THẠNH HOÀ)
                                    </h3>

                                    <p class="text-center">
                                        Địa chỉ: Thôn Thạnh Hoà - Xã Quế Xuân 1 - Huyện Quế Sơn - Tỉnh Quảng Nam
                                    </p>
                                    <p class="text-center">Điện thoại: 0905 946 690</p>
                                </div>

                                <div class="col-md-5 col-12">
                                    <img src="{{asset('uploads/dinhhuongphattrien.webp')}}" alt="Nỗ lực sản xuất chổi đót" srcset="">
                                </div>
                            </div>
                        </div>

                        <div class="cauchuyensp mt-2">
                            <div class="row">
                                
                                <div class="col-md-5 col-12">
                                    <img src="{{asset('uploads/niem-tu-hao.webp')}}" alt="Nỗ lực sản xuất chổi đót" srcset="">
                                </div>

                                <div class="col-md-7 col-12">
                                    <h3>"NIỀM TỰ HÀO CỦA NGƯỜI DÂN THẠNH HOÀ"</h3>
                                    <p>
                                        Nghề làm chổi đót là niềm tự hào của không ít người dân, bỏi nó là cứu cánh giúp họ vượt qua biết bao khó khăn, nhiều gia đình trong xã nhờ làm chổi đót mà có cái ăn, có tiền cho con ăn học tủ tế, thành tài. Xưa kia, sản phẩm chổi đót Thạnh Hoà làm ra bao nhiêu tiêu thụ bấy nhiêu. Tuy nhiên, trong những năm gần đây, chổi đót Thạnh Hoà gặp nhiều khó khăn trong khâu cạnh tranh, tiêu thụ do thiếu sự liên kết đồng bộ trong sản xuất và tiêu thụ sản phẩm
                                    </p>
                                </div>
                            </div>
                        </div>
                       
                       

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
 

.cauchuyensp .col-md-5 img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.cauchuyensp h2 {
    color: #28a745;
    font-size: 24px;
    margin-bottom: 15px;
}

.cauchuyensp h3 {
    color: #fd7e14;
    font-size: 18px;
    margin-bottom: 10px;
}

.cauchuyensp p {
    color: #333;
    font-size: 14px;
    line-height: 1.6;
}

@media (max-width: 768px) {
    .col-md-5, .col-md-7 {
        flex: 0 0 100%;
        max-width: 100%;
    }
}
</style>
@endsection
