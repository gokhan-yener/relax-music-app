function favAdd(id) {

    const token = $("#_token").val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
            'Authorization': 'Bearer ' + token,
        }
    });
    $.ajax
    ({
        type: "POST",
        url: '/api/favAdd',
        data: {'song_id': id},
        dataType: "json",
        success: function (res) {

            if(res.status === 200){
                alert(res.message);
            }else{
                alert(res.message);
            }
        },
        error: function (err) {
            alert(err.message);
        },

    })

};

function favDel(id) {

    const token = $("#_token").val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
            'Authorization': 'Bearer ' + token,
        }
    });
    $.ajax
    ({
        type: "POST",
        url: '/api/favDel',
        data: {'song_id': id},
        dataType: "json",
        success: function (res) {

            if(res.status === 200){
                alert(res.message);
                location.reload();
            }else{
                alert(res.message);
                location.reload();
            }
        },
        error: function (err) {
            alert(err.message);
            location.reload();
        },

    })

};


