/* Block content F.A.Q. visible */
const btnOpen = document.getElementById("btn-open");
const blockHidde = document.getElementById("block-hidden");
const bgGradient = document.getElementById("bg-gradient");

btnOpen.addEventListener("click", () => {
  blockHidde.classList.add("faq__content-open");
  bgGradient.classList.add("faq__content-gradient-none");
  btnOpen.classList.add('btn-none');
});
