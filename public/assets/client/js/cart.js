
const row = document.querySelector(".row");
const inputQuantityCarts = document.querySelectorAll('.input_quantity')

inputQuantityCarts.forEach((inputQuantityItem,index)=>{
    console.log(inputQuantityItem)
    inputQuantityItem.addEventListener("input",function(e){
        console.log(e.target.value)
    })
})

row.addEventListener("click", function (e) {
    const summary_total = document.querySelector('.summary_total')
    const summary_total_all = document.querySelector('.summary_total_all')
    const summary_total_all_hidden = document.querySelector('.total_all_hidden')
    const allInputTotal = document.querySelectorAll('.input_total')
    const quantityHidden = document.querySelectorAll('.quantity_hidden')
    const totalHidden = document.querySelectorAll('.total_hidden')
    const target = e.target;
    let totalInputOutside = 0;
    if (target.classList.contains("increment")) {
        const previousSibling = target.previousElementSibling;
        const inputTotal =
            target.parentElement.nextElementSibling.querySelector(
                ".input_total"
            );
        const priceOfProduct = parseFloat(inputTotal.value) / parseFloat(previousSibling.value);
        previousSibling.value++;
        const data_id = target.parentElement.dataset.id
        quantityHidden[data_id].value = previousSibling.value
        inputTotal.value = priceOfProduct * parseFloat(previousSibling.value)
        totalHidden[data_id].value = inputTotal.value
 
    }
    if (target.classList.contains("decrement")) {
        const nextElementSibling = target.nextElementSibling;
        const inputTotal =
        target.parentElement.nextElementSibling.querySelector(
            ".input_total"
            );
        if (nextElementSibling.value == 1) return;
        const priceOfProduct = parseFloat(inputTotal.value) / parseFloat(nextElementSibling.value);
        nextElementSibling.value--;
        const data_id = target.parentElement.dataset.id
        quantityHidden[data_id].value = nextElementSibling.value
      
        inputTotal.value = priceOfProduct * parseFloat(nextElementSibling.value)
        totalHidden[data_id].value = inputTotal.value
    }

    allInputTotal.forEach(totalInput=>{
        totalInputOutside += parseFloat(totalInput.value)
        
    })
    summary_total.value = totalInputOutside
    summary_total_all.value = totalInputOutside
    summary_total_all_hidden.value = totalInputOutside
});
