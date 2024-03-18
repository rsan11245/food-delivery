$(function (){
    // const win = $(window)
    // win.scroll(() => {
    //     console.log(win.scrollHeight)
    // })

    let cart = $('.cart')
    let openCartButton = $("#nav-menu .menu-cart")
    openCartButton.on('click', () => {
        cart.toggleClass('active')
    })
})

