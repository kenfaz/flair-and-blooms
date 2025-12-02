function launchConfetti() {
    const container = document.getElementById("confetti-container");

    for (let i = 0; i < 40; i++) {
        const confetti = document.createElement("div");
        confetti.classList.add("confetti");

        confetti.style.left = Math.random() * 100 + "%";
        confetti.style.background = `hsl(${Math.random() * 360}, 80%, 60%)`;

        confetti.style.animationDuration = (2 + Math.random() * 2) + "s";

        container.appendChild(confetti);

        setTimeout(() => confetti.remove(), 3500);
    }
}

window.onload = () => {
    launchConfetti();
};

