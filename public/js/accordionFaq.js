var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function () {
        for (var i = 0; i < acc.length; i++) {
            acc[i].classList.remove('active');
        }
        
        this.classList.add("active");

        for (var i = 0; i < acc.length; i++) {
            var panel = acc[i].nextElementSibling;
            panel.style.display = "none";
        }

        var panel = this.nextElementSibling;
        panel.style.display = "block";

        /*if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }*/
    });
}