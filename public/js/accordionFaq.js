var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function () {
        for (var i = 0; i < acc.length; i++) {
            acc[i].classList.remove('active');
            if(this !== acc[i]) {
                var panel = acc[i].nextElementSibling;
                panel.style.display = "none";
            }
        }
        
        this.classList.add("active");

        var panel = this.nextElementSibling;

        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else if(panel.style.display === "none") {
            panel.style.display = "block";
        } else if(panel.style.display === "") {
            panel.style.display = "block";
        }
    });
}