// Ngày tháng năm
var selectDay = document.getElementById("day");
for (var i = 1; i <= 31; i++) {
    var option = document.createElement("option");
    option.value = i; // Gán giá trị cho tùy chọn
    option.textContent = i; // Gán nội dung hiển thị cho tùy chọn
    selectDay.appendChild(option); // Gắn tùy chọn vào phần tử <select>
}
var selectMonth = document.getElementById("month");
for (var i = 1; i <= 12; i++) {
    var option = document.createElement("option");
    option.value = i; // Gán giá trị cho tùy chọn
    option.textContent = i; // Gán nội dung hiển thị cho tùy chọn
    selectMonth.appendChild(option); // Gắn tùy chọn vào phần tử <select>
}
var selectYear = document.getElementById("year");
var now = new Date();
var currentYear = now.getFullYear();
for (var i = 1950; i <= currentYear; i++) {
    var option = document.createElement("option");
    option.value = i; // Gán giá trị cho tùy chọn
    option.textContent = i; // Gán nội dung hiển thị cho tùy chọn
    selectYear.appendChild(option); // Gắn tùy chọn vào phần tử <select>
}
// Shop - details

var numberInput = document.getElementById("numberInput");
var decreaseButton = document.getElementById("decreaseButton");
var increaseButton = document.getElementById("increaseButton");

decreaseButton.addEventListener("click", function () {
    var currentValue = parseInt(numberInput.value);
    numberInput.value = currentValue - 1;
});
increaseButton.addEventListener("click", function () {
    var currentValue = parseInt(numberInput.value);
    numberInput.value = currentValue + 1;
});

// Scroll change Header
window.addEventListener('scroll', function() {
    var headerNav = document.getElementById('header_nav');
    var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    var logo = document.getElementById('logo')
    var items = headerNav.getElementsByClassName('action-item');
    var user_headerNav = document.getElementById('user_headerNav')
    var cart_headerNav = document.getElementById('cart_headerNav')
    var btn_cart_Nav = cart_headerNav.parentNode;
    var btn_icon_search = document.getElementById('icon_searh_nav')
    if (scrollTop > 175) {
        headerNav.classList.add('change');
        logo.src = '/temp/images/logo2.jpg';
        for (var i = 0; i < items.length; i++) {
            var item = items[i];
            item.classList.add('text-white')
        }
        user_headerNav.classList.add('text-white')
        cart_headerNav.classList.add('text-white')
        btn_cart_Nav.style.borderColor = 'white';
        btn_icon_search.style.backgroundColor = '#49965C';

    } else {
        headerNav.classList.remove('change');
        logo.src = '/temp/images/root logo-01.png';
        for (var i = 0; i < items.length; i++) {
            var item = items[i];
            item.classList.remove('text-white')
        }
        user_headerNav.classList.remove('text-white')
        cart_headerNav.classList.remove('text-white')
        btn_cart_Nav.classList.remove('text-white')
        btn_cart_Nav.style.borderColor = '#4B845E';
        btn_icon_search.style.backgroundColor = '#4B845E';

    }
});
var action_respon = document.getElementById("header_action_respon");
var action_header_show = document.getElementById("header_action_show");
action_respon.addEventListener("click", function() {
    // action_header_show.style.display = "block";
    action_header_show.style.transition = "all 0.5s";
    action_header_show.style.transform = "translateX(0)";
    action_header_show.style.opacity = "1";


});
var action_header_exit = document.querySelector('#header_action_show .exit')
action_header_exit.addEventListener("click",function(){
    action_header_show.style.transform = "translateX(-100vw)";
    action_header_show.style.transition = "all 0.5s";
    action_header_show.style.opacity = "0";

})

// Nav tab Product details
function changeTab(index) {
    var tabItems = document.getElementsByClassName('cates-item');
    var tabPanes = document.getElementsByClassName('contentCate');

    for (var i = 0; i < tabItems.length; i++) {
        tabItems[i].classList.remove('active');
        tabPanes[i].classList.remove('active');
    }
    tabItems[index].classList.add('active');
    tabPanes[index].classList.add('active');
}

// Shop - details
//Day
