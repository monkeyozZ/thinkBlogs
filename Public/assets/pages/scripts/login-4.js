var Login = function () {

	var handleLogin = function() {
		$('.login-form').validate({
	            errorElement: 'span', //default input error message container
	            errorClass: 'help-block', // default input error message class
	            focusInvalid: false, // do not focus the last invalid input
	            //onfocusout: false,
				onkeyup:false,
	            rules: {
	                username: {
	                    required: true
	                },
	                password: {
	                    required: true
	                },
	                remember: {
	                    required: false
	                }
	            },

	            messages: {
	                username: {
	                    required: "请输入用户名",
	                },
	                password: {
	                    required: "请输入密码",
	                }
	            },

	            invalidHandler: function (event, validator) { //display error alert on form submit   
	                $('.alert-danger', $('.login-form')).show();
	            },

	            highlight: function (element) { // hightlight error inputs
	                $(element)
	                    .closest('.form-group').addClass('has-error'); // set error class to the control group
	            },

	            success: function (label) {
	                label.closest('.form-group').removeClass('has-error');
	                label.remove();
	            },

	            errorPlacement: function (error, element) {
	                error.insertAfter(element.closest('.input-icon'));
	            },

	            submitHandler: function (form) {
	            	var status = $('.remember').is(':checked');
	            	var username = $('.username').val();
	            	var password = $('.password').val();
                    var remember = 0;
                    //alert(status)
	            	if(status){
                        remember = $('.remember').val()
					}

                    //remember =
	            	var host = window.location.host;
	                $.ajax({
	                    	type: "post",
	                    	url: 'http://'+host+'/thinkBlogs/index.php/admin/login/login',
	                    	dataType: "json",
	                    	data: {
	                    		'username': username,
	                    		'password': password,
								'remember': remember
	                    		},
                    		success: function(res){
                    			console.log(res)
                    			if(res.type==2){
	                    			$('#usererr').html(res.msg).show();
	                    			$('.userbox').addClass('has-error')
                    			}
                    			if(res.type==1){
	                    			$('#passerr').html(res.msg).show();
	                    			$('.passbox').addClass('has-error')
                    			}
                    			if(res.status==1){
                    				window.location.href = res.url
                    			}
                    		}
	                })
	                
	            }
	        });
	        $('.login-form input').keypress(function (e) {
	            if (e.which == 13) {
	                if ($('.login-form').validate().form()) {
	                    $('.login-form').submit();
	                }
	                return false;
	            }
	        });
	}
    
    return {
        //main function to initiate the module
        init: function () {
        	
            handleLogin();

            // init background slide images
		    $.backstretch([
		        "/thinkBlogs/Public/assets/pages/media/bg/1.jpg",
		        "/thinkBlogs/Public/assets/pages/media/bg/2.jpg",
		        "/thinkBlogs/Public/assets/pages/media/bg/3.jpg",
		        "/thinkBlogs/Public/assets/pages/media/bg/4.jpg"
		        ], {
		          fade: 1000,
		          duration: 8000
		    	}
        	);
        }
    };

}();

jQuery(document).ready(function() {
    Login.init();
});