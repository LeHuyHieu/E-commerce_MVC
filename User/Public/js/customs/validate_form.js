$(document).ready(function() {
    if ($('.show-login').length) {
        $('.show-login').click(function() {
            $('#showFormLogin').removeClass('d-none');
            $('#showFormRegister').addClass('d-none');
        })

        //validate form login
        if ($('#showFormLogin').length) {
            let form = $('#showFormLogin').find('form');
            form.validate({
                onfocusout: false,
                onkeyup: false,
                onclick: false,
                rules: {
                    "username": {
                        required: true,
                        maxlength: 15,
                        minlength: 5
                    },
                    "password": {
                        required: true,
                        minlength: 8
                    }
                },
                messages: {
                    "username": {
                        required: "Bắt buộc nhập username",
                        maxlength: "Hãy nhập tối đa 15 ký tự",
                        minlength: "Hãy nhập tối thiểu 5 ký tự"
                    },
                    "password": {
                        required: "Bắt buộc nhập password",
                        minlength: "Hãy nhập ít nhất 8 ký tự"
                    }
                }
            });
        }
    }
    if ($('.show-rigister').length) {
        $('.show-rigister').click(function() {
            $('#showFormRegister').removeClass('d-none');
            $('#showFormLogin').addClass('d-none');
        })

        //validate form register
        if($('#showFormRegister').length) {
            let form = $('#showFormRegister').find('form');
            form.validate({
                onfocusout: false,
                onkeyup: false,
                onclick: false,
                rules: {
                    "username": {
                        required: true,
                        maxlength: 15,
                        minlength: 5
                    },
                    "email": {
                        required: true,
                        email: true
                    },
                    "password": {
                        required: true,
                        minlength: 8
                    },
                    "re-password": {
                        equalTo: "#password",
                        minlength: 8
                    },
                    messages: {
                        "username": {
                            required: "Bắt buộc nhập username",
                            maxlength: "Hãy nhập tối đa 15 ký tự",
                            minlength: "Hãy nhập tối thiểu 5 ký tự"
                        },
                        "email": {
                            required: "Bắt buộc nhập email",
                            email: "Nhập đúng theo cú pháp username@gmail.com"
                        },
                        "password": {
                            required: "Bắt buộc nhập password",
                            minlength: "Hãy nhập ít nhất 8 ký tự"
                        },
                        "re-password": {
                            equalTo: "Hai password phải giống nhau",
                            minlength: "Hãy nhập ít nhất 8 ký tự"
                        }
                    }
                }
            });
        }
    }
});