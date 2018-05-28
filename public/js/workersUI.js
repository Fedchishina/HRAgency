$(document).ready(function () {
    /**
     * Ajax pre-setup for all requests
     */
    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        dataType: "JSON",
    });

    /**
     * Configuration and make JSTree instance
     * and bind event to change node and move
     */
    $('#tree').jstree({
        core: {
            force_text: true,
            themes: {
                responsive: true,
                variant: 'medium',
                stripes: true
            },
            animation: 500,
            data: {
                url: lazyLoadURI,
                data: function (node) {
                    return {id: node.id};
                }
            },
            check_callback: true,
        },
        types: {
            default: {
                icon: '/img/person-card.png',
            },
        },
        search: {
            fuzzy: false,
            ajax: {
                url: searchItemsURI,
                dataType: 'JSON',
                type: 'GET'
            },
        },
        massload: {
            url: massLoadURI,
            type: 'POST',
            data: function (nodes) {
                return {ids: nodes.join(',')};
            }
        },
        plugins: [
            'search', 'state', 'types', 'sort',
            'wholerow', 'dnd', 'massload',
        ]
    }).on('changed.jstree', function (e, data) {
        if (jQuery.isEmptyObject(data.node) === false) {
            $('#flname').text(data.node.original.text);
            $('#position').text(data.node.original.position);
            $('#salary').text(data.node.original.salary);
            $('#date').text(data.node.original.created_at);
            $('#profile-image').html('<img src="' + data.node.original.image_link + '" alt="Card Image" class="image-photo">');
        }
    }).bind('move_node.jstree', function (e, data) {
        $.ajax({
            url: moveItemURI,
            type: 'GET',
            data: {
                id: data.node.id,
                parent: data.parent,
            },
            success: function () {
                showModalNotify(0, 'Item moved success!');
            },
            error: function (jqXHR, exception) {
                showModalNotify(1, 'For this action you need to be authorized! Error code: ' + jqXHR.status);
            }
        });
    });

    /**
     * Search button click event
     * @to eventTimer {boolean}
     */
    var to = false;

    $('#btn-find').on('click', function (event) {
        event.preventDefault();
        if (to) {
            clearTimeout(to);
        }
        to = setTimeout(function () {
            $('#tree').jstree(true).search(
                $('#find-text').val(),
                false,
                $('#find-check').is(':checked')
            );
        }, 250);
    });

    /**
     * Add key press listener to input field
     * and wait Enter press
     */
    $('#find-text').keypress(function (event) {
        if (event.which == 13) {
            event.preventDefault();
            $("#btn-find").click();
        }
    });

    /**
     * Clear search button event
     */
    $('#btn-clear').on('click', function (event) {
        event.preventDefault();
        $('#tree').jstree(true).search('');
    });
});