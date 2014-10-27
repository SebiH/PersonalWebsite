var currentActiveSite;

var loadingSpinner = (function () {/*
            <div class='demo'>
              <div class='circle'>
                <div class='inner'></div>
              </div>
              <div class='circle'>
                <div class='inner'></div>
              </div>
              <div class='circle'>
                <div class='inner'></div>
              </div>
              <div class='circle'>
                <div class='inner'></div>
              </div>
              <div class='circle'>
                <div class='inner'></div>
              </div>
            </div> */}).toString().match(/[^]*\/\*([^]*)\*\/\}$/)[1];

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
    if (site == currentActiveSite)
        return;
    $('#contentcontainer').html(loadingSpinner);

    $.ajax({
        url: 'scripts/loadSite.php',
        data: {
            sitename: site,
            format: 'json'
        },
        error: function() {
            $('#contentcontainer').html('<p>An error has occurred</p>');
            setActiveMenu('');
        },
        dataType: 'json',
        success: function(data) {
            if (data.error != null)
            {
                $('#contentcontainer').html(data.error);
                setActiveMenu('');
            }
            else
            {
                $('#contentcontainer').html(data.result);
                setActiveMenu(site);
            }
        },
        type: 'POST'
    });
}

function bla(site) {

}

function setActiveMenu(site) {
    currentActiveSite = site;

    // remove active element from all classes
    var elements = $('.menu-item-link');

    for (var i = 0; i < elements.length; i++)
    {
        var element = elements[i];
        element.className = element.className.replace(/\bpure-menu-selected\b/, '').trim();

        if (site.length > 0 && element.href.indexOf(site) >= 0)
            element.className = element.className + " pure-menu-selected";
    }
}
