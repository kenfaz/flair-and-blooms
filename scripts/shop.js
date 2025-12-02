function showPopup(message) {
  const popup = document.getElementById("cart-popup");
  const msg = document.getElementById("cart-popup-message");

  msg.textContent = message;
  popup.classList.add("show");

  setTimeout(() => {
    popup.classList.remove("show");
  }, 2500); // auto fade after 2.5 sec
}

document.addEventListener("DOMContentLoaded", () => {
  const buttons = document.querySelectorAll(".cart-btn");

  buttons.forEach((btn) => {
    btn.addEventListener("click", () => {
      const productId = btn.getAttribute("data-product-id");

      fetch("php_functions/add_to_cart.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded",
        },
        body: "product_id=" + productId,
      })
        .then((response) => response.json())
        .then((data) => {
          if (data.status === "added" || data.status === "updated") {
            showPopup("Item added to cart! Quantity: " + data.quantity);
          } else {
            showPopup("Error: " + data.message);
          }
        })
        .catch((err) => console.error(err));
    });
  });
});

function showPopup(message) {
  const popup = document.getElementById("cart-popup");
  const msg = document.getElementById("cart-popup-message");

  msg.textContent = message;
  popup.classList.add("show");

  setTimeout(() => {
    popup.classList.remove("show");
  }, 2800); // stays longer for better visibility
}

