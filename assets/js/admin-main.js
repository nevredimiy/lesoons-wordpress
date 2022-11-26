jQuery(document).ready(function($){
    $('.shoper-options').on('click', '.delete-main-post', function () {
        $('#main_post, #main_post_id').val('');
        $('#main_post_title').empty();
    });

    $('#main_post').autocomplete({
        source: ajaxurl + '?action=main_post_action&_wpnonce=' + shoperObject.nonce,
        minLength: 2,
        delay: 500,
        select:function(event,ui){
            $('#main_post_id').val(ui.item.id);

            $('#main_post_title').html('<strong>' + shoperObject.post_selected + '</strong> ' + ui.item.label + ' <button class="button delete-main-post"><span class="dashicons dashicons-trash"></span></button>');
        }
    });
});