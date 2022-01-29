/* Issue 146*/

$(".currency-with-toggler-wrapper button").click(function () {
    $(".globe").toggle();
});

/* mobile search bar */

// function mobileSearchBar(screenSize) {
//     if (screenSize.matches) {
//         $("#pills-tab").insertAfter("#pills-tabContent");
//         $("#pills-tabContent .input-group button[type='button']")
//             .empty()
//             .append('<i class="bi bi-zoom-in"></i>');
//     } else {
//         $("#pills-tabContent").insertAfter("#pills-tab");
//     }
// }

// const screenSize = window.matchMedia("(max-width: 768px)");

// screenSize.addListener(mobileSearchBar);

// $(".filter-btn").val();
