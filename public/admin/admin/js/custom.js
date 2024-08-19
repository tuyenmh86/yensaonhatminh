// ******************************** Genarator Password ********************
function randomPassword(length) {
	var chars = "abcdefghijklmnopqrstuvwxyz!@#$%^&*()+<>ABCDEFGHIJKLMNOP1234567890";
	var pass = "";
	for (var x = 0; x < length; x++) {
		var i = Math.floor(Math.random() * chars.length);
		pass += chars.charAt(i);
	}
	return pass;
}

function generate() {
    myform.password.value = randomPassword(myform.length.value);
}

// ********************** Check whitespace in strings **********************
function hasWhiteSpace(s) {
  return s.indexOf(' ') >= 0;
}

// ************************** Create Slug *******************************
function changeToSlug(title,lang)
{
    var slug;
 
    //Đổi chữ hoa thành chữ thường
    slug = title.toLowerCase();
 
    //Đổi ký tự có dấu thành không dấu
    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
    slug = slug.replace(/đ/gi, 'd');
    //Xóa các ký tự đặt biệt
    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
    //Đổi khoảng trắng thành ký tự gạch ngang
    slug = slug.replace(/ /gi, "-");
    //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
    //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
    slug = slug.replace(/\-\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-/gi, '-');
    slug = slug.replace(/\-\-/gi, '-');
    //Xóa các ký tự gạch ngang ở đầu và cuối
    slug = '@' + slug + '@';
    slug = slug.replace(/\@\-|\-\@|\@/gi, '');
    //In slug ra textbox có id “slug”
    var now = new Date(); 
    var datetime = now.getDate()+''+now.getMinutes()+''+now.getSeconds();
    if(slug != ''){
        document.getElementById(lang+'_alias').value = slug+'-'+datetime;
    } else {
        document.getElementById(lang+'_alias').value = '';
    }
    
}

// ************************** Create Slug Style 2 *******************************
function changeToSlug2(title,lang)
{
    var slug;
 
    //Đổi chữ hoa thành chữ thường
    slug = title.toLowerCase();
 
    //Đổi ký tự có dấu thành không dấu
    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
    slug = slug.replace(/đ/gi, 'd');
    //Xóa các ký tự đặt biệt
    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
    //Đổi khoảng trắng thành ký tự gạch ngang
    slug = slug.replace(/ /gi, "-");
    //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
    //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
    slug = slug.replace(/\-\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-/gi, '-');
    slug = slug.replace(/\-\-/gi, '-');
    //Xóa các ký tự gạch ngang ở đầu và cuối
    slug = '@' + slug + '@';
    slug = slug.replace(/\@\-|\-\@|\@/gi, '');
    //In slug ra textbox có id “slug”
    var now = new Date(); 
    var datetime = now.getDate()+''+now.getMinutes()+''+now.getSeconds();
    document.getElementById(lang+'_alias').value = slug;
    
}
// ************************* DISABLE EVEN ENTER FORM ********************
function preventEnterKey(event) {
    if (event.keyCode==13) {
        event.preventDefault();
    }
}
// ********************** FORMAT CURRENCY *******************************
var inputnumber = 'Input value not a number.';
    function FormatNumber(str) {
        var strTemp = GetNumber(str);
        if (strTemp.length <= 3)
            return strTemp;
        strResult = "";
        for (var i = 0; i < strTemp.length; i++)
            strTemp = strTemp.replace(",", "");
        var m = strTemp.lastIndexOf(".");
        if (m == -1) {
            for (var i = strTemp.length; i >= 0; i--) {
                if (strResult.length > 0 && (strTemp.length - i - 1) % 3 == 0)
                    strResult = "," + strResult;
                strResult = strTemp.substring(i, i + 1) + strResult;
            }
        } else {
            var strphannguyen = strTemp.substring(0, strTemp.lastIndexOf("."));
            var strphanthapphan = strTemp.substring(strTemp.lastIndexOf("."),
                    strTemp.length);
            var tam = 0;
            for (var i = strphannguyen.length; i >= 0; i--) {

                if (strResult.length > 0 && tam == 4) {
                    strResult = "," + strResult;
                    tam = 1;
                }

                strResult = strphannguyen.substring(i, i + 1) + strResult;
                tam = tam + 1;
            }
            strResult = strResult + strphanthapphan;
        }
        return strResult;
    }

    function GetNumber(str) {
        var count = 0;
        for (var i = 0; i < str.length; i++) {
            var temp = str.substring(i, i + 1);
            if (!(temp == "," || temp == "." || (temp >= 0 && temp <= 9))) {
                alert(inputnumber);
                return str.substring(0, i);
            }
            if (temp == " ")
                return str.substring(0, i);
            if (temp == ".") {
                if (count > 0)
                    return str.substring(0, ipubl_date);
                count++;
            }
        }
        return str;
    }

    function IsNumberInt(str) {
        for (var i = 0; i < str.length; i++) {
            var temp = str.substring(i, i + 1);
            if (!(temp == "." || (temp >= 0 && temp <= 9))) {
                alert(inputnumber);
                return str.substring(0, i);
            }
            if (temp == ",") {
                return str.substring(0, i);
            }
        }
        return str;
    }