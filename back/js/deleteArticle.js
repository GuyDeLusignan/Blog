$(document).ready(function($) {

    var target = $('.posts-tooltip');

    var observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            console.log(mutation.type);
        });
    })

    var tooltipOrigin,
    instanceTooltip;

    $('body').on('click', '.posts-tooltip:not(.tooltipstered)', function(){
        $(this)
        .tooltipster({
            functionBefore: function(instance, helper) {
                instanceTooltip = instance;
                tooltipOrigin = instance['_$origin'];
            },
            trigger: 'click',
            interactive: true,
            theme: 'tooltipster-shadow',
            contentCloning: true,
            animation: 'fade',
            animationDuration: 100,
            side: 'bottom'
        }).tooltipster('open');

        

        $('body').on('click', '.tooltipster-content span', function(event) {
            var idDelete = tooltipOrigin.parent().attr('id');
            $.ajax({
                method: 'POST',
                url: 'controller/postsController.php',
                data: {idDelete: idDelete}
            }).done(function (response) {
                // $(".debug-body").html(response);
                if(response === "deleted") {
                    instanceTooltip.close();
                    $("#"+idDelete).parent().slideUp('fast', function() {
                        $(this).remove();
                    });
                }
            })
        })

    });
});