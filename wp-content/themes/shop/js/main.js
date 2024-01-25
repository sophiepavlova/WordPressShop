(function ($) {
  "use strict";

  // Dropdown on mouse hover
  $(document).ready(function () {
    function toggleNavbarMethod() {
      if ($(window).width() > 992) {
        $(".navbar .dropdown")
          .on("mouseover", function () {
            $(".dropdown-toggle", this).trigger("click");
          })
          .on("mouseout", function () {
            $(".dropdown-toggle", this).trigger("click").blur();
          });
      } else {
        $(".navbar .dropdown").off("mouseover").off("mouseout");
      }
    }
    toggleNavbarMethod();
    $(window).resize(toggleNavbarMethod);
  });

  // Back to top button
  $(window).scroll(function () {
    if ($(this).scrollTop() > 100) {
      $(".back-to-top").fadeIn("slow");
    } else {
      $(".back-to-top").fadeOut("slow");
    }
  });
  $(".back-to-top").click(function () {
    $("html, body").animate({ scrollTop: 0 }, 1500, "easeInOutExpo");
    return false;
  });

  // Vendor carousel
  $(".vendor-carousel").owlCarousel({
    loop: true,
    margin: 29,
    nav: false,
    autoplay: true,
    smartSpeed: 1000,
    responsive: {
      0: {
        items: 2,
      },
      576: {
        items: 3,
      },
      768: {
        items: 4,
      },
      992: {
        items: 5,
      },
      1200: {
        items: 6,
      },
    },
  });

  // Related carousel
  $(".related-carousel").owlCarousel({
    loop: true,
    margin: 29,
    nav: false,
    autoplay: true,
    smartSpeed: 1000,
    responsive: {
      0: {
        items: 1,
      },
      576: {
        items: 2,
      },
      768: {
        items: 3,
      },
      992: {
        items: 4,
      },
    },
  });

  // Product Quantity

  //   $(".quantity button").on("click", function () {
  //     var button = $(this);
  //     var oldValue = button.parent().parent().find("input").val();
  //     if (button.hasClass("btn-plus")) {
  //       var newVal = parseFloat(oldValue) + 1;
  //     } else {
  //       if (oldValue > 0) {
  //         var newVal = parseFloat(oldValue) - 1;
  //       } else {
  //         newVal = 0;
  //       }
  //     }
  //     button.parent().parent().find("input").val(newVal);
  //   });
  // })(jQuery);

  //🚩 Code I am rewriting

  //   $(".quantity .btn-minus, .quantity .btn-plus").on("click", function (event) {
  //     // alert("Hi!");
  //     event.preventDefault();

  //     var button = $(this);
  //     console.log(button);

  //     var oldValue = button.parent().parent().find("input").val();
  //     if (button.hasClass("btn-plus")) {
  //       var newVal = parseFloat(oldValue) + 1;🧐
  //     } else {
  //       if (oldValue > 0) {
  //         var newVal = parseFloat(oldValue) - 1;
  //       } else {
  //         newVal = 0;
  //       }
  //     }
  //     button.parent().parent().find("input").val(newVal);//
  //   });
})(jQuery);

// 🐹 Js rewrite

const btnMinusArr = document.querySelectorAll(".quantity .btn-minus");
const btnPlusArr = document.querySelectorAll(".quantity .btn-plus");
const btnInputArr = document.querySelectorAll(".quantity input");
const updateCartbtn = document.querySelector("#update-cart-button");

btnMinusArr.forEach((button, index) => {
  if (
    btnMinusArr[index] !== null &&
    btnPlusArr[index] !== null &&
    btnInputArr[index] !== null
  ) {
    button.addEventListener("click", function (event) {
      event.preventDefault();

      if (btnInputArr[index].value > 0) {
        btnInputArr[index].value--;
        //Removing the disables attribute from the Update Cart button
        // updateCartbtn.removeAttribute("disabled");
      }
    });
  }
});

btnPlusArr.forEach((button, index) => {
  if (
    btnMinusArr[index] !== null &&
    btnPlusArr[index] !== null &&
    btnInputArr[index] !== null
  ) {
    button.addEventListener("click", function (event) {
      event.preventDefault();

      btnInputArr[index].value++;
      //Removing the disables attribute from the Update Cart button
      // updateCartbtn.removeAttribute("disabled");
    });
  }
});
