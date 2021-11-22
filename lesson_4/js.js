
let el = document.getElementById("addMore");
el.addEventListener("click", () => { addMoreProducts(1); }, false);


async function addMoreProducts(next = 0) {

    const response = await fetch('/addMoreProducts.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ limit: next }),
    });

    const result = await response.json();
    addContentProducts(result);
    // console.log(result);
}


function addContentProducts(result) {
    let el = document.querySelector('.product-list');
    el.innerHTML += result.results;

}

addMoreProducts();