/**
 * Created by ivan on 14.06.17.
 */

$( document ).ready(function() {
    App.index();
    App.loadElements();

});

var App = {
    index: function(){
        $('#submit').on('click', function (e) {
                e.preventDefault();
                var site = $('#site').val();
                var type = $('#type').val();

                $.ajax({
                    url: '/index.php?page=ajax',
                    data: {
                        site: site,
                        type: type
                    }
                }).done(function(response){
                    // console.log('ok');
                    $('#status').text(response)/*.fadeOut(
                        2000,
                        function(){
                            $('#status').text('').show();
                        });*/

                });
            }
        );

    },

    loadElements: function(){
        $('.result').on('click', function(e){
            var id = $(this).attr('data-id');
            console.log(id);
            $.ajax({
                url: '/index.php?page=details',
                data: id
            }).done(function(response){

            });
        });
    }
};