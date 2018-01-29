$(function() {
    var interval_id = 0;
    var interval = 3000;

    function getNewAnn()
    {
        $.post( link, { lastId: lastId, _token: _token }, function( data ) {
            //console.log(data);

            var currentNotficationCount = $("#menu1>li:not(.more)").length;
            if(data['status'] == 'success')
            {
                if( data['announcement'].length > 0 )
                {
                    lastId = data['lastId'];
                    for(var n in data['announcement'])
                    {
                        new PNotify({
                            title: 'Yeni elan var',
                            text: data['announcement'][n]['header'],
                            type: 'info',
                            hide: true,
                            delay: 3000,
                            text_escape: false,
                            styling: 'bootstrap3'
                        });
                        currentNotficationCount++;
                    }
                    $("#menu1").prepend(data['view']);


                    if(currentNotficationCount > notficationCount)
                    {
                        $("#menu1 li:not(.more):gt(" + (notficationCount-1) + ")").remove();
                        $("#not-count").text(notficationCount + "+");
                        $("#menu1 li.more").removeClass('hidden');
                    }
                    else $("#not-count").text(currentNotficationCount);
                }

                interval_id = setTimeout(getNewAnn, interval);
            }
            else
            {
                new PNotify({
                    title: 'Səhv oldu!',
                    text: 'İnternet kəsilib vəya xəta var.',
                    type: 'error',
                    hide: false,
                    styling: 'bootstrap3'
                });
            }

        });
    }

    $(window).focus(function() {
        if (!interval_id)
            interval_id = setTimeout(getNewAnn, interval);
    });

    $(window).blur(function() {
        clearInterval(interval_id);
        interval_id = 0;
    });

    $(document).on("click",".deleteAction",function () {
        $elm = $(this);

        $.confirm({
            title: 'Təsdiq',
            content: 'Silmək istədiyinizə əminsizin?',
            type: 'red',
            typeAnimated: true,
            buttons: {
                "Sil": function () {
                    window.location.href = $elm.attr("href");
                },
                "İmtina": function () {

                },
            }
        });

        return false;
    });

    $(".formFind").keypress(function(e) {
        if(e.which == 13) {
            $(this).parents("form:eq(0)").submit();
        }
    });

    $("select.formFind").change(function(e) {
            $(this).parents("form:eq(0)").submit();
    });

    $(".mypages .btn-info[href]").click(function(e) {
        var form = $(".formFinder");
        if(form.length > 0)
        {
            var page = $(this).attr("href").match(/(\d+)$/i)[0];
            form.find("input[name='page']").val(page);
            form.submit();
            return false;
        }
        else return true;
    });
});

$(".menu_section .child_menu:not(:has(li))").parents("li:eq(0)").remove();