
"console" in window && console.log("%cHi Developer\nIf you find an error please report  on this page %chttps://penandaku.com/bug/\n%cGive your feedback on this page %chttps://penandaku.com/feedback/",
	"color: #000000; font-size: 17px; line-height: 2",
	"color: #2bbbad; font-size: 17px; line-height: 2; font-style: normal",
	"color: #000000; font-size: 17px; line-height: 2",
	"color: #2bbbad; font-size: 17px; line-height: 2; font-style: normal");

$(document).ready(function(){
    $(".form-login form").submit(function() {
        var email    = $("[name='username']").val();
        var password = $("[name='password']").val();
        //conditions
        if(email.length == 0){
            setTimeout(function() {
                /*toastr.error('Email is still empty');*/
                var opts = {
                "debug": false,
                "positionClass": "toast-top-right",
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "2000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            toastr.error("Masukkan Username Anda.", "ERROR !", opts);
            }, 1000);
        }
        else if(password.length == 0){
            setTimeout(function() {
                /*toastr.error('Email is still empty');*/
                var opts = {
                "debug": false,
                "positionClass": "toast-top-right",
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "2000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            toastr.error("Masukkan Password Anda.", "ERROR !", opts);
            }, 1000);
        }else{  
            return true;
        }
        return false;
    })
});
