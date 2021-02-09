var acc = document.getElementsByClassName("contentcard-accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;

        panel.classList.toggle("contentcard-panel-open");
    });
}