const container = document.getElementById("sakura-container");
const card = document.querySelector(".card");
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