/**
 * Created by ivan on 14.06.17.
 */

$( document ).ready(function() {
    App.manageTextField();
    App.find();
    App.loadElements();

});

var App = {
    find: function(){
        $('#submit').on('click', function (e) {
                e.preventDefault();
                var site = $('#site').val();
                var type = $('#type').val();
                var text = $('#textField').val();

                $.ajax({
                    url: '/index.php?page=ajax',
                    data: {
                        site: site,
                        type: type,
                        text: text
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
            e.preventDefault();
            var id = $(this).attr('data-id');
            $.ajax({
                url: '/index.php?page=details',
                data: {
                    id: id
                }
            }).done(function(response){
                var recordsList = App.sliceString(response, '<img');
                $('#detailsContainer').text(recordsList);
            });
        });
    },

    manageTextField: function(){
        $('#type').on('change', function(){
            if($('#type').val() === 'text'){
                $('#textDiv').show();
            } else {
                $('#textDiv').hide();
            }
        })
    },

    sliceString: function(string, delimiter){
        var list = string.split(delimiter);
        for(var index in list){
            if (index != 0) {
                list[index] = delimiter + list[index];
            }
        }

        if(list[0] === ""){
            delete list[0];
        }

        return list;
    }


};