document.addEventListener("DOMContentLoaded", () => {
    const nextBtns = document.querySelectorAll(".next-btn");
    const prevBtns = document.querySelectorAll(".prev-btn");
    const formSteps = document.querySelectorAll(".form-step");
    let formStepsNum = 0;

    nextBtns.forEach(btn => {
        btn.addEventListener("click", () => {
            formSteps[formStepsNum].classList.remove("active");
            formStepsNum++;
            formSteps[formStepsNum].classList.add("active");
        });
    });

    prevBtns.forEach(btn => {
        btn.addEventListener("click", () => {
            formSteps[formStepsNum].classList.remove("active");
            formStepsNum--;
            formSteps[formStepsNum].classList.add("active");
        });
    });

    document.getElementById("product-form").addEventListener("submit", (e) => {
        e.preventDefault();
        alert("Producto subido con éxito!");
    });
});
