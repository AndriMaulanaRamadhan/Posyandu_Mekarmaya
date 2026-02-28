document.addEventListener("DOMContentLoaded", function () {
    const toggle = document.getElementById("togglePassword");
    const password = document.getElementById("password");

    toggle.addEventListener("click", function () {
        const isHidden = password.type === "password";
        password.type = isHidden ? "text" : "password";

        this.innerHTML = isHidden
            ? '<i class="bi bi-eye-slash-fill"></i>'
            : '<i class="bi bi-eye-fill"></i>';
    });
});