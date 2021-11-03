loadCart();

function loadCart(){
    $.ajax({
        method: "GET",
        url: "/admin/load-notification",
        success:function (response) {
            $('.cart').html('');
            $('.cart').html(response.count);
        }
    });
}

// var path = "{{ route('auto') }}";
// $('input.typeahead').typeahead({
//     source:function name(terms, process) {
//         return $.get(path, {terms:terms}, function (data) {
//             return process(data);
//         });
//     }
// });