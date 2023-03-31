const target = document.getElementById("header__logo--button");
target.addEventListener("click", () => {
    target.classList.toggle("open");
    const nav = document.getElementById("header__menu");
    nav.classList.toggle("in");
});
