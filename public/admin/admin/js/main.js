// ************************ LOAD PRODUCTS BY CATEGORY *******************
function load_records () {
	// ============== TOKEN  =======================
    var token = document.getElementById('csrf_token').value;
	// ============== URL  =======================
    let category_id = document.getElementById('categories').value;
    
    console.log(category_id)
    $.ajax({
        url: admincp/products/,
        type: "post",
        data: {"_token": token, "id_arr":id_arr} ,
        success: function (success) { 
            location.reload(); 
        },
        error: function() {
            alert('Cập nhập dữ liệu thất bại.Vui lòng thử lại');
        }
    });
}
// ************************ CHECKED LISTS ****************************
function check_lists () {
	if(document.getElementById("checkAll").checked == true) {
		checkboxes = document.getElementsByName('checkSingle').value;
		$('#table_active tbody tr td input[type="checkbox"]').each(function(){
            $(this).prop('checked', true);
        });
	}else {
		$('#table_active tbody tr td input[type="checkbox"]').each(function(){
            $(this).prop('checked', false);
        });
	}
}
// ************************ ACTIVE UPDATE RECOREDS *******************
function update_records () {
	// ============== TOKEN  =======================
	var token = document.getElementById('csrf_token').value;
	// ============== URL  =======================
	var url = document.getElementById('action_table').value;
	// ============== ID ARRAY =====================
    var id_arr = new Array();
    $('#table_active tbody tr td input[type="checkbox"]').each(function(){
        if($(this).is(':checked')){
            id_arr.push($(this).val());
        }
    });
    // ============== ACTION =======================
    if(url == ""){
    	$('#action_table').addClass('border-red');
    }else if(id_arr.length == 0){
    	alert('Vui lòng chọn trường dữ liệu thao tác')
    }else {
    	$.ajax({
            url: url,
            type: "post",
            data: {"_token": token, "id_arr":id_arr} ,
            success: function (success) { 
                location.reload(); 
            },
            error: function() {
                alert('Cập nhập dữ liệu thất bại.Vui lòng thử lại');
            }
        });
    }
}

// ************************ UPDATE POSISION ****************************
function update_posision (url,id,value) {
    // ============== TOKEN  =======================
    var token = document.getElementById('csrf_token').value;
    // ============== URL  =======================
    if(value.length  > 10){
        alert('Không thể nhập nhiều hơn 10 ký tự');
    }
    else {
        $.ajax({
            url: url,
            type: "post",
            data: {"_token": token, "pos":value,"id":id} ,
            success: function (success) {
                location.reload(); 
            },
            error: function() {
                alert('Cập nhập dữ liệu thất bại.Vui lòng thử lại');
            }
        });
    }
}

// ************************ BEGIN:: CHOOSE IMAGE ****************************
function choose_image () {
    $('.iframe-btn').fancybox({ 
        'width'     : 900,
        'minHeight' : 800,
        'type'      : 'iframe',
        'autoScale' : true
    });

    $('#image_link').on('change',function(){
        alert('change triggered');
    });
    responsive_filemanager_callback();
}

function responsive_filemanager_callback(field_id){ 
    // console.log(field_id);
    var url=jQuery('#'+field_id).val();
    // alert('update '+field_id+" with "+url); 
    $('#image_preview').attr('src',document.getElementById("image_link").value).show();
            parent.$.fancybox.close();
} 


// ********************** BEGIN:: SEO DESCRIPTION ****************************
function seo_description(object) {
    var len = object.value.length;
    if (len >= 160) {
      val.value = val.value.substring(0, 160);
    } else {
      $(object).parent().find('#charNum').text('(Bạn còn '+ (160 - len)+' ký tự)');
    }
};

function seo_custom_link(object) {
    var val = object.value;
    if(val.length > 0) {
        $(object).parent().find('.link_append').html('/'+val);
    }else {
        $(object).parent().find('.link_append').html('/example/demo');
    } 
};

