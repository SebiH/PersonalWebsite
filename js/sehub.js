function getAnchor()
{
    var anchor = window.location.hash;
    return anchor;
}

function loadContentFromAnchor() {
    var site = window.location.hash;
    site = site.replace('#', '');
    loadContent(site);
}

function loadContent(site) {
    $.ajax({
        url: 'scripts/loadSite.php',
        data: {
            sitename: site,
            format: 'json'
        },
        error: function() {
            $('#contentcontainer').html('<p>An error has occurred</p>');
        },
        dataType: 'json',
        success: function(data) {
            if (data.error != null)
                $('#contentcontainer').html(data.error);
            else
                $('#contentcontainer').html(data.result);
        },
        type: 'POST'
    });
}
