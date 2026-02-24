const container = document.getElementById("sakura-container");
const card = document.querySelector(".login-card");

const cardRect = card.getBoundingClientRect();

for (let i = 0; i < 25; i++) {
    const sakura = document.createElement("div");
    sakura.classList.add("sakura");
    sakura.innerHTML = "🌸";

    let randomX;
    do {
        randomX = Math.random() * window.innerWidth;
    } while (
        randomX > cardRect.left - 50 &&
        randomX < cardRect.right + 50
    );

    sakura.style.left = randomX + "px";
    sakura.style.animationDuration = (10 + Math.random() * 8) + "s";
    sakura.style.fontSize = (14 + Math.random() * 8) + "px";

    container.appendChild(sakura);
}

const toggleBtn = document.getElementById("togglePassword");
const passwordInput = document.getElementById("password");

toggleBtn.addEventListener("click", function () {
    const icon = this.querySelector("i");

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        icon.classList.remove("bi-eye-fill");
        icon.classList.add("bi-eye-slash-fill");
    } else {
        passwordInput.type = "password";
        icon.classList.remove("bi-eye-slash-fill");
        icon.classList.add("bi-eye-fill");
    }
});