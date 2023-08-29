function dntToggle(hiddenElement)
{
    var ele = document.getElementById(hiddenElement);
    var text = document.getElementById("displayText");
    if (ele.style.display == "block") {
        ele.style.display = "none";
        text.innerHTML = "Show";
    } else {
        ele.style.display = "block";
        text.innerHTML = "Hide";
    }
}

$(document).ready(function () {
    $(".showContentPreloader").click(function () {
        $('.plugin-loader.loader').fadeIn();
        $('.right-side').fadeOut();
    });
});