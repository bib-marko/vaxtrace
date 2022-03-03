$(window).scroll(function () {
    if (document.documentElement.scrollTop <= 800) {
        document.querySelector("#scroll_to_top").style.display = "none";
    } else {
        document.querySelector("#scroll_to_top").style.display = "block";
    }
});

function scrollToTop() {
    document
        .querySelector("#scroll_to_top")
        .addEventListener("click", function (e) {
            e.preventDefault();
            document
                .querySelector(this.getAttribute("data-scroll-to"))
                .scrollIntoView({
                    behavior: "smooth",
                });
        });
}
