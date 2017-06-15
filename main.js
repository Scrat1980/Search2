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

                App.validateInput(site, type, text, function(){
                    $.ajax({
                        url: '/index.php?page=ajax',
                        data: {
                            site: site,
                            type: type,
                            text: text
                        }
                    }).done(function(response){
                        $('#status').text(response)
                    });

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
                $('#detailsContainer').text(response);
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

    validateInput: function(site, type, text, callback){
        var alertStyle = {
            "border-color": "red",
            "border-width":"2px",
            "border-style":"solid"
        };

        var commonStyle = {
            "border-color": "grey",
            "border-width":"1px",
            "border-style":"solid"
        };

        if(site === ''){
            $('#site').css(alertStyle);
        } else {
            $('#site').css(commonStyle);
        }

        var textEmpty = (
            type === 'text' 
            && $('#textField').val() === ''
        );

        if(textEmpty) {
            $('#textField').css(alertStyle)
        } else {
            $('#textField').css(commonStyle)
        }

        callback(site, type, text);
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