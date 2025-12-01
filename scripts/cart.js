// Update quantity or remove items
document.querySelectorAll('.cart-item').forEach(item => {
    const cartId = item.getAttribute('data-cart-id');
    const qtyEl = item.querySelector('.qty');
    const subtotalEl = item.querySelector('.sub-total');
    const price = parseFloat(item.querySelector('.price').textContent.replace('₱',''));

    item.querySelector('.increase').addEventListener('click', () => updateQuantity(cartId, 1, qtyEl, subtotalEl, price));
    item.querySelector('.decrease').addEventListener('click', () => updateQuantity(cartId, -1, qtyEl, subtotalEl, price));
    item.querySelector('.remove-btn').addEventListener('click', () => removeItem(cartId, item));
});

function updateQuantity(cartId, change, qtyEl, subtotalEl, price){
    let newQty = parseInt(qtyEl.textContent) + change;
    if(newQty < 1) return;

    fetch('update_cart.php', {
        method: 'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'cart_id='+cartId+'&quantity='+newQty
    })
    .then(res => res.json())
    .then(data => {
        if(data.status === 'success'){
            qtyEl.textContent = newQty;
            subtotalEl.textContent = (price*newQty).toFixed(2);
            updateTotal();
        }
    });
}

function removeItem(cartId, itemEl){
    fetch('remove_cart.php', {
        method: 'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'cart_id='+cartId
    })
    .then(res => res.json())
    .then(data => {
        if(data.status === 'success'){
            itemEl.remove();
            updateTotal();
        }
    });
}

function updateTotal(){
    let total = 0;
    document.querySelectorAll('.sub-total').forEach(el => total += parseFloat(el.textContent));
    document.getElementById('total').textContent = total.toFixed(2);
}

document.getElementById("checkout-btn").addEventListener("click", function() {
    window.location.href = "checkout.php"; // change this to your desired page
});
