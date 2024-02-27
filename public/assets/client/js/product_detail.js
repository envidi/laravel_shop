const row = document.querySelector(".product_detail_contain_input");

row.addEventListener("click", function (e) {
    const target = e.target;
    if (
        target.classList.contains("increment_product_detail") ||
        target.classList.contains("increment_product_detail_icon")
    ) {
        const element = target.closest(".increment_product_detail");
        const previousSibling = element.previousElementSibling;
        previousSibling.value++;
    }
    if (
        target.classList.contains("decrement_product_detail") ||
        target.classList.contains("decrement_product_detail_icon")
    ) {
        const element = target.closest(".decrement_product_detail");
        const nextElementSibling = element.nextElementSibling;
        if (nextElementSibling.value == 1) return;
        nextElementSibling.value--;
    }
});
