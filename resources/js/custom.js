"console" in window && console.log("%cHi Developer\nIf you find an error please report  on this page %chttps://penandaku.com/bug/\n%cGive your feedback on this page %chttps://penandaku.com/feedback/",
	"color: #000000; font-size: 17px; line-height: 2",
	"color: #2bbbad; font-size: 17px; line-height: 2; font-style: normal",
	"color: #000000; font-size: 17px; line-height: 2",
	"color: #2bbbad; font-size: 17px; line-height: 2; font-style: normal");

function validateEmail(email) {
	var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return re.test(email);
}

$(document).ready(function(){
    $(".form-featured form").submit(function() {
        var files    = $("[name='files']").val();
        var link     = $("[name='link']").val();
        //conditions
        if(files.length == 0){
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
            toastr.error("Pilih Images Featured Anda.", "ERROR !", opts);
            }, 1000);
        }
        else if(link.length == 0){
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
            toastr.error("Masukkan Link Featured Anda.", "ERROR !", opts);
            }, 1000);
        }else{  
            return true;
        }
        return false;
    })
});

$(document).ready(function(){
    $(".form-label form").submit(function() {
        var nama             = $("[name='nama']").val();
        var descriptions     = $("[name='descriptions']").val();
        //conditions
        if(nama.length == 0){
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
            toastr.error("Masukkan Nama Label Anda.", "ERROR !", opts);
            }, 1000);
        }
        else if(descriptions.length == 0){
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
            toastr.error("Masukkan Descriptions Label Anda.", "ERROR !", opts);
            }, 1000);
        }else{  
            return true;
        }
        return false;
    })
});

$(document).ready(function(){
    $(".form-contact form").submit(function() {
        var nama        = $("[name='nama']").val();
        var email       = $("[name='email']").val();
        var message     = $("[name='message']").val();
        //conditions
        if(nama.length == 0){
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
                toastr.error("Masukkan Nama Lengkap Anda.", "ERROR !", opts);
            }, 1000);
        }
        else if(email.length == 0){
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
                toastr.error("Masukkan Email  Anda.", "ERROR !", opts);
            }, 1000);
        }else if(email !== validateEmail()) {
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
                toastr.error("Alamat Email  Tidak Valid.", "ERROR !", opts);
            }, 1000);
        }else if(message.length < 10) {
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
                toastr.error("Message  Minimal 10 Character .", "ERROR !", opts);
            }, 1000);
        }else if(message.length == 0) {
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
                toastr.error("Masukkan Message  Anda.", "ERROR !", opts);
            }, 1000);
        }else{

            return true;
        }
        return false;
    })
});

