function validateForm() {
    var name = document.forms["contactForm"]["name"].value;
    var email = document.forms["contactForm"]["email"].value;
    var message = document.forms["contactForm"]["message"].value;
    var captcha = document.forms["contactForm"]["g-recaptcha-response"].value;

    if (name == "" || email == "" || message == "") {
        alert("Please fill out all fields.");
        return false;
    }

    if (captcha == "") {
        alert("Please complete the captcha.");
        return false;
    }

    return true;
}
