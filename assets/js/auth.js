$(function () {
    $("#login-form").submit(function (e) {
        submit_login(e)
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


    const pattern = new RegExp('^((8|\\+7)[\\- ]?)?(\\(?\\d{3}\\)?[\\- ]?)?[\\d\\- ]{7,10}$')

    if (!pattern.test(phone_input.val())) {
        errors.phone = 'Телефон заполнен неверно'
    }
    if (password_input.val().length < 4 || password_input.val().length > 100) {
        errors.password = 'Пароль заполнен неверно'
    }


    if (errors) {
        display_login_errors(errors)
    } else {
        login_request(phone_input.val(), password_input.val())
    }
}


function display_login_errors(errors) {
    for (const errorsKey in errors) {
        $(`input#${errorsKey} ~ p.input-error`).first().html(errors[errorsKey])
    }
}

function login_request(phone, password) {
    //отослать ajax запрос
}