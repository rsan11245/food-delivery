$(function () {
    $("#login-form").submit(function (e) {
        submit_login(e)
    })

    $("#register-form").submit(function (e) {
        submit_register(e)
    })

})


function submit_login(e) {
    e.preventDefault()
    let phone_input = $("#phone")
    let password_input = $("#password")

    validate_login(phone_input, password_input)
}

function validate_login(phone_input, password_input) {
    let errors = {}




    if (!validate_phone(phone_input.val())) {
        errors.phone = 'Телефон заполнен неверно'
    }
    if (password_input.val().length < 4 || password_input.val().length > 100) {
        errors.password = 'Пароль заполнен неверно'
    }


    if (Object.keys(errors).length > 0) {
        display_errors(errors)
    } else {
        login_request(phone_input.val(), password_input.val())
    }
}

function validate_phone(phone){
    const pattern = new RegExp('^((8|\\+7)[\\- ]?)?(\\(?\\d{3}\\)?[\\- ]?)?[\\d\\- ]{7,10}$')
    return pattern.test(phone);
}


function display_errors(errors) {
    for (const errorsKey in errors) {
        $(`input#${errorsKey} ~ p.input-error`).first().html(errors[errorsKey])
    }
}

function login_request(phone, password) {
    $.ajax('/app/auth/index.php', {
        type: 'POST',
        data: {login: '', phone, password},
        success: data => {
            data = JSON.parse(data)
            if (data.errors) {
                display_errors(data.errors)
                if (data.errors.message) {
                    showPopup(data.errors.message)
                }

            } else {
                window.location.replace(data.location);
            }
        }
    })
}





function submit_register(e) {
    e.preventDefault()
    let phone_input = $("#phone")
    let password_input = $("#password")
    let confirm_password_input = $("#confirm_password")

    validate_register(phone_input, password_input, confirm_password_input)
}

function validate_register(phone_input, password_input, confirm_password_input) {
    let errors = {}

    if (!validate_phone(phone_input.val())) {
        errors.phone = 'Телефон заполнен неверно'
    }
    if (password_input.val().length < 4 || password_input.val().length > 100) {
        errors.password = 'Пароль заполнен неверно'
    }
    if (password_input.val() !== confirm_password_input.val()) {
        errors.confirm_password = 'Пароли не совпадают'
    }


    if (Object.keys(errors).length > 0) {
        display_errors(errors)
    } else {
        register_request(phone_input.val(), password_input.val(), confirm_password_input.val())
    }
}


function register_request(phone, password, confirm_password) {
    $.ajax('/app/auth/index.php', {
        type: 'POST',
        data: {registration: '', phone, password, confirm_password},
        success: data => {
            data = JSON.parse(data)
            if (data.errors) {
                display_errors(data.errors)
                showPopup('message')
                if (data.errors.message) {
                    showPopup(data.errors.message)
                }
            } else {
                window.location.replace(data.location);
            }
        }
    })
}

function showPopup(message, timeout = 2000) {
    let popup = $(".popup")
    popup.toggleClass('display-none')
    popup.text(message)

    setTimeout(() =>{
        popup.toggleClass('display-none')
    }, timeout)
}


