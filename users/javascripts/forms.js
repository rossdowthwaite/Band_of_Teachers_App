function formhash(form, password) {
password = hex_sha512(password.value);
password.type = "hidden";
// Finally submit the form.
form.submit();
}