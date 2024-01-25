// Buttons for grid and list
document.addEventListener("DOMContentLoaded", function () {
  // Your code here
  const btnGallery = document.querySelector(".btn-gallery");
  const btnList = document.querySelector(".btn-list");
  const productsContainer = document.querySelector(".products");
  // const children = productsContainer.children;

  //   console.log("Hi");
  //   console.log(productsContainer);
  //   console.log(children);

  if (btnList != null) {
    const children = productsContainer.children;
    btnList.addEventListener("click", function () {
      for (let i = 0; i < children.length; i++) {
        children[i].classList.remove("col-lg-4", "col-md-6", "col-sm-6");
        children[i].classList.add("col-lg-12", "col-md-12", "col-sm-12");

        children[i].children[0].classList.add("list-view");
      }
    });
    btnGallery.addEventListener("click", function () {
      for (let i = 0; i < children.length; i++) {
        children[i].classList.remove("col-lg-12", "col-md-12", "col-sm-12");
        children[i].classList.add("col-lg-4", "col-md-6", "col-sm-6");

        children[i].children[0].classList.remove("list-view");
      }
    });
  }
});

//Removing the disables attribute from the Update Cart button on the cart page only
const btnInput = document.querySelectorAll(".btn-js");
// console.log(btnInput);
const btnUpdateCart = document.querySelector(
  ".woocommerce-cart-form .update-cart"
);

btnInput.forEach((btn) => {
  btn.addEventListener("click", function (event) {
    if (btnUpdateCart !== undefined) {
      btnUpdateCart.removeAttribute("disabled");
    }
  });
});

//Removing the line in the Cart summary table
const table = document.querySelector(".table-summary");
// console.log(table);
// console.log(table.firstElementChild.firstElementChild.firstElementChild);
if (table) {
  table.firstElementChild.firstElementChild.classList.add("no_border");
}
//End of removing the line
