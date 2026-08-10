// ======================================
// MAIN JS
// Luxury Store Template
// ======================================

document.addEventListener("DOMContentLoaded", function () {

    // ===============================
    // Sticky Header
    // ===============================

    const header = document.getElementById("header");

    window.addEventListener("scroll", function () {

        if (window.scrollY > 80) {

            header.classList.add("sticky");

        } else {

            header.classList.remove("sticky");

        }

    });


    // ===============================
    // Scroll Top Button
    // ===============================

    const scrollTop = document.getElementById("scrollTop");

    window.addEventListener("scroll", function () {

        if (window.pageYOffset > 300) {

            scrollTop.classList.add("show");

        } else {

            scrollTop.classList.remove("show");

        }

    });

    scrollTop.addEventListener("click", function () {

        window.scrollTo({

            top: 0,

            behavior: "smooth"

        });

    });


    // ===============================
    // Active Navigation
    // ===============================

    let current = window.location.href;

    let navLinks = document.querySelectorAll(".navbar-menu a");

    navLinks.forEach(link => {

        if (link.href === current) {

            link.classList.add("active");

        }

    });


    // ===============================
    // Search Input Focus Effect
    // ===============================

    let searchInput = document.querySelector(".search-box input");

    if (searchInput) {

        searchInput.addEventListener("focus", function () {

            this.parentElement.classList.add("focused");

        });

        searchInput.addEventListener("blur", function () {

            this.parentElement.classList.remove("focused");

        });

    }


    // ===============================
    // Bootstrap Tooltips
    // ===============================

    let tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));

    tooltipTriggerList.map(function (tooltipTriggerEl) {

        return new bootstrap.Tooltip(tooltipTriggerEl);

    });


    // ===============================
    // Quantity Buttons
    // ===============================

    document.querySelectorAll(".qty-plus").forEach(btn => {

        btn.addEventListener("click", function () {

            let input = this.parentElement.querySelector(".qty-input");

            input.value = parseInt(input.value) + 1;

        });

    });

    document.querySelectorAll(".qty-minus").forEach(btn => {

        btn.addEventListener("click", function () {

            let input = this.parentElement.querySelector(".qty-input");

            if (parseInt(input.value) > 1) {

                input.value = parseInt(input.value) - 1;

            }

        });

    });


    // ===============================
    // Product Image Preview
    // ===============================

    const mainImage = document.querySelector(".product-main-image img");

    const thumbs = document.querySelectorAll(".product-thumb img");

    thumbs.forEach(img => {

        img.addEventListener("click", function () {

            if (mainImage) {

                mainImage.src = this.src;

            }

        });

    });


    // ===============================
    // Newsletter Validation
    // ===============================

    let newsletter = document.querySelector("#newsletterForm");

    if (newsletter) {

        newsletter.addEventListener("submit", function (e) {

            let email = this.querySelector("input[type=email]");

            if (email.value.trim() === "") {

                e.preventDefault();

                alert("Please enter your email.");

            }

        });

    }


    // ===============================
    // Loading Animation
    // ===============================

    window.addEventListener("load", function () {

        document.body.classList.add("loaded");

    });

});

const saleDate = new Date();

saleDate.setDate(saleDate.getDate() + 7);

setInterval(() => {

    const now = new Date().getTime();

    const distance = saleDate - now;

    document.getElementById("days").innerHTML = Math.floor(distance / (1000 * 60 * 60 * 24));

    document.getElementById("hours").innerHTML = Math.floor((distance % (1000*60*60*24))/(1000*60*60));

    document.getElementById("minutes").innerHTML = Math.floor((distance % (1000*60*60))/(1000*60));

    document.getElementById("seconds").innerHTML = Math.floor((distance % (1000*60))/1000);

},1000);

document.addEventListener("DOMContentLoaded", function () {

    /*
    ==================================
    Wishlist
    ==================================
    */

    let wishlist = JSON.parse(localStorage.getItem("wishlist")) || [];

    document.querySelectorAll(".wishlist-btn").forEach(btn => {

        let id = btn.dataset.product;

        if (wishlist.includes(id)) {

            btn.classList.add("active");

            btn.innerHTML='<i class="fas fa-heart"></i>';

        }

        btn.onclick=function(){

            if(wishlist.includes(id)){

                wishlist=wishlist.filter(item=>item!=id);

                btn.classList.remove("active");

                btn.innerHTML='<i class="far fa-heart"></i>';

            }else{

                wishlist.push(id);

                btn.classList.add("active");

                btn.innerHTML='<i class="fas fa-heart"></i>';

            }

            localStorage.setItem("wishlist",JSON.stringify(wishlist));

        }

    });


    /*
    ==================================
    Quick View
    ==================================
    */

    document.querySelectorAll(".quick-view").forEach(button=>{

        button.onclick=function(e){

            e.preventDefault();

            let id=this.dataset.id;

            fetch("/product/"+id)

            .then(res=>res.text())

            .then(html=>{

                document.getElementById("quickViewContent").innerHTML=html;

                new bootstrap.Modal(document.getElementById('quickViewModal')).show();

            });

        }

    });


    /*
    ==================================
    AJAX Cart
    ==================================
    */

    document.querySelectorAll(".ajax-cart").forEach(button=>{

        button.onclick=function(e){

            e.preventDefault();

            let id=this.dataset.id;

            fetch("/cart/add/"+id,{

                method:"GET",

                headers:{

                    "X-Requested-With":"XMLHttpRequest"

                }

            })

            .then(res=>res.json())

            .then(data=>{

                Toast("Product Added Successfully");

            })

            .catch(()=>{

                Toast("Something went wrong");

            });

        }

    });

});


/*
==================================
Toast
==================================
*/

function Toast(message){

let toast=document.createElement("div");

toast.className="custom-toast";

toast.innerHTML='<i class="fas fa-check-circle"></i> '+message;

document.body.appendChild(toast);

setTimeout(()=>{

toast.classList.add("show");

},100);

setTimeout(()=>{

toast.remove();

},3000);

}



document.addEventListener("DOMContentLoaded", function () {

    /*====================================
      IMAGE GALLERY
    ====================================*/

    window.changeImage = function (element) {

        document.getElementById("mainProductImage").src = element.src;

        document.querySelectorAll(".thumbnail-image").forEach(img => {
            img.classList.remove("active");
        });

        element.classList.add("active");

    };


    /*====================================
      QUANTITY
    ====================================*/

    const qtyInput = document.getElementById("qty");
    const cartQty = document.getElementById("cartQuantity");

    document.getElementById("plus").addEventListener("click", function () {

        qtyInput.value++;

        cartQty.value = qtyInput.value;

    });

    document.getElementById("minus").addEventListener("click", function () {

        if (qtyInput.value > 1) {

            qtyInput.value--;

            cartQty.value = qtyInput.value;

        }

    });

    qtyInput.addEventListener("keyup", function () {

        if (qtyInput.value < 1 || qtyInput.value == "") {

            qtyInput.value = 1;

        }

        cartQty.value = qtyInput.value;

    });


    /*====================================
      WISHLIST
    ====================================*/

    let wishlist = JSON.parse(localStorage.getItem("wishlist")) || [];

    const wishlistBtn = document.querySelector(".wishlist-detail");

    const productId = "{{ $product->id }}";

    if (wishlist.includes(productId)) {

        wishlistBtn.classList.add("active");

        wishlistBtn.innerHTML = '<i class="fas fa-heart me-2"></i>Wishlisted';

    }

    wishlistBtn.addEventListener("click", function () {

        if (wishlist.includes(productId)) {

            wishlist = wishlist.filter(id => id != productId);

            wishlistBtn.classList.remove("active");

            wishlistBtn.innerHTML = '<i class="far fa-heart me-2"></i>Wishlist';

            showToast("Removed from Wishlist");

        } else {

            wishlist.push(productId);

            wishlistBtn.classList.add("active");

            wishlistBtn.innerHTML = '<i class="fas fa-heart me-2"></i>Wishlisted';

            showToast("Added to Wishlist");

        }

        localStorage.setItem("wishlist", JSON.stringify(wishlist));

    });


    /*====================================
      IMAGE ZOOM
    ====================================*/

    const image = document.querySelector(".main-image img");

    image.addEventListener("mousemove", function (e) {

        let rect = image.getBoundingClientRect();

        let x = ((e.clientX - rect.left) / rect.width) * 100;

        let y = ((e.clientY - rect.top) / rect.height) * 100;

        image.style.transformOrigin = x + "% " + y + "%";

    });

    image.addEventListener("mouseenter", function () {

        image.style.transform = "scale(1.6)";

    });

    image.addEventListener("mouseleave", function () {

        image.style.transform = "scale(1)";

        image.style.transformOrigin = "center";

    });

});

function showToast(message){

    let toast = document.createElement("div");

    toast.className = "custom-toast";

    toast.innerHTML = '<i class="fas fa-check-circle me-2"></i>' + message;

    document.body.appendChild(toast);

    setTimeout(function(){

        toast.classList.add("show");

    },100);

    setTimeout(function(){

        toast.classList.remove("show");

        setTimeout(function(){

            toast.remove();

        },300);

    },2500);

}