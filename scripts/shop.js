document.addEventListener("DOMContentLoaded", () => {
  const buttons = document.querySelectorAll(".cart-btn");

  buttons.forEach((btn) => {
    btn.addEventListener("click", () => {
      const productId = btn.getAttribute("data-product-id"); // use data-product-id

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
            alert("Product added to cart! Quantity: " + data.quantity);
          } else {
            alert("Error: " + data.message);
          }
        })
        .catch((err) => console.error(err));
    });
  });
});
