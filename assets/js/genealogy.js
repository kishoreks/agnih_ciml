var root_user_name = $('#root_user_name').val();
var tree_url = $('#tree_url').val();

jQuery(document).ready(function() {
    getGenologyTree(root_user_name, null);
    generateTooltips();
});

function getGenologyTree(user_name, event) {
    if (event && $(event.target).hasClass('tree_up_icon')) {
        if ($(event.target).closest('.jOrgChart').parent('.orgChart').parent().hasClass('tree-expand')) {
            shrinkGenologyTree(user_name, event);
            return;
        }
    }
    $.ajax({
        type: "POST",
        url: tree_url,
        data: {
            user_name: user_name
        },
        beforeSend: function() {

        },
        success: function(data) {
            if (data == 'invalid')
                location.reload();
            $('#summary').html(data);
            $("#tree_view").jOrgChart({
                chartElement: '#tree',
                dragAndDrop: false
            });

            panZoom();
        }
    });
}

function shrinkGenologyTree(user_name, event) {
    var target_node = $(event.target).parent('div').parent('div.node');
    if ($(target_node).closest('.jOrgChart').parent('.orgChart').parent('.tree-expand').prev('.tree-expand').length) {
        var orig_div = $(target_node).closest('.jOrgChart').parent('.orgChart').parent('.tree-expand').prev('.tree-expand');
    }
    else {
        var orig_div = $(target_node).closest('.jOrgChart').parent('.orgChart').parent('.tree-expand').prev('.jOrgChart');
    }
    $(orig_div).find('.node-expand').siblings('.line-expand').remove();
    $(orig_div).find('.node-expand').siblings('.line-expand-right').remove();
    $(orig_div).find('.node-expand').siblings('.line-expand-down').remove();
    $(orig_div).find('.node-expand').removeClass('node-expand');
    $(target_node).closest('.jOrgChart').parent('.orgChart').parent('.tree-expand').nextAll('.tree-expand').remove();
    $(target_node).closest('.jOrgChart').parent('.orgChart').parent('.tree-expand').remove();
}

function expandGenologyTree(user_name, event) {
    var target_node = $(event.target).parent('div').parent('div.node');
    if ($(target_node).closest('.jOrgChart').parent('.orgChart').parent().hasClass('tree-expand')) {
        $(target_node).closest('.jOrgChart').parent('.orgChart').parent('.tree-expand').nextAll('.tree-expand').remove();
    }
    else {
        $('.tree-expand').remove();
    }
    $(target_node).closest('.jOrgChart').find('.node-expand').siblings('.line-expand').remove();
    $(target_node).closest('.jOrgChart').find('.node-expand').siblings('.line-expand-right').remove();
    $(target_node).closest('.jOrgChart').find('.node-expand').siblings('.line-expand-down').remove();
    $(target_node).closest('.jOrgChart').find('.node-expand').removeClass('node-expand');
    $(target_node).addClass('node-expand');
    $(target_node).before("<div class='line left line-expand'></div><div class='line right top line-expand-right'></div><div class='line left line-expand-down'></div>");
    var root_left = $(target_node).closest('.jOrgChart').find('img.root_node').offset().left;
    var line_left = $(target_node).siblings('.line-expand-right').offset().left;
    var right_expand_width = root_left - line_left + 34;
    if (right_expand_width < 0) {
        var margin_left = $(target_node).closest('.jOrgChart').find('.node-expand').siblings('.line-expand-right').css('margin-left').replace(/[^-\d\.]/g, '');
        var new_margin_left = right_expand_width + Math.abs(margin_left) - 2;
        $(target_node).closest('.jOrgChart').find('.node-expand').siblings('.line-expand-right').width(Math.abs(right_expand_width) + 4);
        $(target_node).closest('.jOrgChart').find('.node-expand').siblings('.line-expand-right').css('margin-left', new_margin_left);
        $(target_node).closest('.jOrgChart').find('.node-expand').siblings('.line-expand-down').css('margin-left', new_margin_left);
    }
    else {
        $(target_node).closest('.jOrgChart').find('.node-expand').siblings('.line-expand-right').width(right_expand_width);
        $(target_node).closest('.jOrgChart').find('.node-expand').siblings('.line-expand-down').width(right_expand_width);
    }

    $('#tree').append("<div id='summary-" + user_name + "' class='tree-expand'></div>");

    $.ajax({
        type: "POST",
        url: tree_url,
        data: {
            user_name: user_name
        },
        beforeSend: function () {

        },
        success: function (data) {
            if (data == 'invalid') {
                location.reload();
            }
            $('#summary-' + user_name).html(data);
            $('#summary-' + user_name).find('#tooltip_div').attr('id', 'tooltip_div-' + user_name);
            $('#summary-' + user_name).find('#tree_view').attr('id', 'tree_view-' + user_name);
            $('#summary-' + user_name).find('#tree').attr('id', 'tree-' + user_name);
            $("#tree_view-" + user_name).jOrgChart({
                chartElement: '#tree-' + user_name,
                dragAndDrop: false
            });
        }
    });
}

function goToLink(url) {
    window.location.href = url;
}

function generateTooltips() {
    $('body').on('mouseenter', '.tree_icon.with_tooltip:not(.tooltipstered)', function() {
        $(this).tooltipster({
            theme: 'tooltipster-shadow',
            contentAsHTML: true,
            delay: 100,
            interactive: true,
            arrow: false,
            side: ['top', 'bottom'],

        });
        $(this).tooltipster('show');
    });
}

function panZoom() {
    $('body').find('#summary').find('#tree').panzoom({
        $zoomIn: $(".zoom-in"),
        $zoomOut: $(".zoom-out"),
        $reset: $(".zoom-reset"),
        startTransform: 'scale(1.0)',
        maxScale: 2.0,
        increment: 0.05,
        disablePan: true,
        // panOnlyWhenZoomed: true,
        // contain: true
    });
}