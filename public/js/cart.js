// $(document).ready(function () {
//
//     $.get('/ajax-total-cart-item', function (data) {
//         $('#total-cart').text(data);
//     });
//
//     $('#add_to_cart').on('click', function (event) {
//         let qty_input = $('#main_48278-33');
//         let qty = parseInt(qty_input.val());
//         let product_id = qty_input.data('id');
//
//         $.get('add-to-cart?product_id=' + product_id + '&qty=' + qty, function (data) {
//             let totalItems = 0;
//             let totalCartEl = $('#total-cart');
//             totalCartEl
//                 .empty();
//             $.each(data, function (index, item) {
//                 totalItems += parseInt(item.quantity);
//             });
//             totalCartEl
//                 .text(totalItems);
//         });
//     })
// });

// const URL = 'http://fkfshop.test/';
//
// function getCartItems() {
//     return axios.get(URL + 'product/cart-items')
//         .then(res => res.data)
//         .then(data => data.items);
// }

// let cart = new Vue({
//     el: '#cart',
//     data: {
//         noWay: 'No way',
//         cartItems: {},
//         imgDir: URL + 'img/shop/'
//     },
//     created: function () {
//         getCartItems()
//             .then(data => this.cartItems = data);
//     },
//     mounted: function () {
//         // console.log(this.cartItems);
//     },
//     methods: {},
// });
//
// function updateCartQty(product_id, qty) {
//     return axios.get(URL + 'product/update-cart-quantity?product_id=' + product_id + '&qty=' + qty)
//         .then(res => res.data)
//         .then(data => data.items);
// }
/*

const shoppingBag = new Vue({
    el: '#shopping-bag',
    data: {
        items: {},
        imgDir: URL + 'img/shop/'
    },
    created() {
        getCartItems()
            .then(data => this.items = data);
    },
    mounted() {
        console.log('get cart Item', this.items)
    },
    methods: {
        // updateQty (item, type) {
        //     let qty;
        //     switch (type) {
        //         case  'inc':
        //             qty = parseInt(item.quantity) + 1
        //             break
        //         case  'dec':
        //             qty = parseInt(item.quantity) - 1
        //             break
        //     }
        //     updateCartQty(item.id, qty)
        //         .then(data => this.items = data)
        // }
    }
})*/
