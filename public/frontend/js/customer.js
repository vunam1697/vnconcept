$(document).on('click','.page-agency:not(.active)', function(e) {

    var __this = $(this);

    var url = __this.data('href');

    var page = __this.data('page');

    $.ajax({
        url: url+'?page='+page,
        type: 'GET',
        beforeSend: function() {
        },
        success: function(data) {

            __this.parents('.pagination').find('.active').removeClass('active');

            __this.addClass('active');

            __this.parents('.admin__main').find('.agency_load').html(data);

        }
    });
});

$('.select-admin').on('change', function() {

    var __this = $(this);

    var limit = this.value;

    console.log(limit);

    $.ajax({
        url: urlAjax+'?limit='+limit,
        type: 'GET',
        beforeSend: function() {
        },
        success: function(data) {

            __this.parents('.pagination').find('.active').removeClass('active');

            __this.addClass('active');

            __this.parents('.admin__main').find('.agency_load').html(data);

        }
    });
});
