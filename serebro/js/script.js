// Окно авторизации
const authWindowBlock = document.querySelector(".auth-window-block");
const shadowLink = document.querySelector(".shadow-link");
const authLink = document.querySelector(".auth-link");
if (authLink)
authLink.addEventListener("click", function() {
    authWindowBlock.style.display = "block";
    document.querySelector(".auth-form input").focus();
})
if (shadowLink)
shadowLink.addEventListener("click", function() {
    authWindowBlock.style.display = "none";
})
const logoutLink = document.querySelector(".logout-link");
const logoutBlock = document.querySelector(".logout-block");
if (logoutLink)
logoutLink.addEventListener("click", function() {
    if (logoutBlock.style.display == "block") {
        logoutBlock.style.display = "none";
    } else {
        logoutBlock.style.display = "block";
    }
})

// Авторизация
const authForm = document.querySelector(".auth-form form");
if (authForm)
authForm.addEventListener("submit", function(e) {
    e.preventDefault();
    let authData = {
        login: document.querySelector(".auth-login").value,
        password: document.querySelector(".auth-password").value
    }
    $.ajax({
        type: "POST",
        url: "/includes/auth.php",
        data: authData,
        success: 
           function(data) {
            if (data == 'yes') {
                alert('Вы авторизовались!');
                authForm.submit();
            } else {
                alert('Неверный логин или пароль!');
                location.reload();
            }
               
           }
    });
})

// Добавляет товар в корзину
const buy = document.querySelectorAll(".buy");
buy.forEach(function(b) {
    b.addEventListener("click", function(e) {
        let id = b.getAttribute("id");
        e.preventDefault();

        $.ajax({
         type: "POST",
         url: "/includes/addtocart.php",
         data: "id="+id,
         success: 
            function(data) { 
                alert("Товар добавлен в корзину");
            }
        });

    })
})

// Удаляет товар из корзины
const del = document.querySelectorAll(".delete");
del.forEach(function(d) {
    d.addEventListener("click", function(e) {
        let id = d.getAttribute("id");
        e.preventDefault();

        $.ajax({
         type: "POST",
         url: "/includes/deletefromcart.php",
         data: "id="+id,
         success: 
            function(data) { 
                alert("Товар удален из корзины");
                d.closest(".block-list-cart").remove();
                allprice();
            }
        });

    })
})

// Очищает корзину
const clearcart = document.querySelector("#clear-cart");
const cartProducts = document.querySelector(".cart-products");
if (clearcart)
clearcart.addEventListener("click", function (e) {
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: "/includes/clearcart.php",
        success: function(data) {
            document.querySelector(".cart-products").parentElement.innerHTML = '<h1 align="center">Корзина пуста</h1>';
            allprice();
        }
    });
});

// Выход из аккаунта
const logout = document.querySelector("#logout");
if (logout)
logout.addEventListener("click", function (e) {
    e.preventDefault();
    $.ajax({
    type: "POST",
    url: "/includes/logout.php",
    success: function(data) {
        location.reload();
    }
    });
});

// Кнопка плюс в корзине
const plus = document.querySelectorAll(".plus-button");
if (plus)
plus.forEach(function (p) {
    p.addEventListener("click", function(){
        let plusid = p.getAttribute("plusid");
        let price = document.querySelector("#product"+plusid+" > h5 > .span-price").innerHTML;
        $.ajax({
            type: "POST",
            url: "/includes/plus.php",
            data: "plusid="+plusid,
            success: function(data) {
                document.querySelector("#product"+plusid+" > h5 > .span-count").innerHTML = data;
                document.querySelector("#price"+plusid).innerHTML = price * data + " руб";
                p.nextElementSibling.innerHTML = data;
                allprice();
            }
        });
    })
})

// Кнопка минус в корзине
const minus = document.querySelectorAll(".minus-button");
if (minus)
minus.forEach(function (m) {
    m.addEventListener("click", function(){
        let minusid = m.getAttribute("minusid");
        let price = document.querySelector("#product"+minusid+" > h5 > .span-price").innerHTML;
        $.ajax({
            type: "POST",
            url: "/includes/minus.php",
            data: "minusid="+minusid,
            success: function(data) {
                document.querySelector("#product"+minusid+" > h5 > .span-count").innerHTML = data;
                document.querySelector("#price"+minusid).innerHTML = price * data + " руб";
                m.previousElementSibling.innerHTML = data;
                allprice();
            }
        });
    })
})

// Итоговая цена
function allprice(){
    $.ajax({
     type: "POST",
     url: "/includes/allprice.php",
     dataType: "html",
     cache: false,
     success: function(data) {
        if ( document.querySelector(".allprice") )
        document.querySelector(".allprice > strong").innerHTML = data;
    }
   });
}