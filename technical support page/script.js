document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("support form").addEventListener("submit", function(event) {
        event.preventDefault();
        var form = this;
        var formData = new FormData(form);
        var display = new XMLHttpRequest();
        display.open("POST", "submit_support_form.php",true);
        display.onreadystatechange = function() {
            if (display.readyState === 4 && display.status === 200) {
                alert(display.responseText);
                form.reset();
            }
        };
        display.send(formData);
    });
});
