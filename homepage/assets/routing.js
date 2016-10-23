spf.init({
    'cache-unified': true,
    'url-identifier': '.spf.json'
});


function setActiveLink(event) {
    var links = document.getElementsByClassName('custom-menu-link');
    const selectedLinkClass = "selected";

    for (var i = 0; i < links.length; i++) {
        var el = links[i];
        var isSelectedPage = (el.href === window.location.href);
        if (isSelectedPage) {
            el.classList.add(selectedLinkClass)
        } else {
            el.classList.remove(selectedLinkClass)
        }
    }
}

document.addEventListener('spfdone', setActiveLink);

