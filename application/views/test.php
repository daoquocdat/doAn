<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <style>
            .container {
                width: 70%;
                margin: auto;
                text-align: center;
            }
            /* Dropdown Button */
            .dropbtn {
                background-color: #4CAF50;
                color: white;
                padding: 16px;
                font-size: 16px;
                border: none;
                cursor: pointer;
            }
             
            /* ĐỔi màu nền khi hover và focus Dropdown button */
            .dropbtn:hover, .dropbtn:focus {
                background-color: #3e8e41;
            }
             
            /* Định dạng các thẻ bao bọc các menu */
            .dropdown {
                position: relative;
                display: block;
            }
             
            /* Dropdown Content, mặc định sẽ được ẩn đi */
            .dropdown-content {
                display: none;
                position: absolute;
                background-color: #f9f9f9;
                min-width: 160px;
                box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                z-index: 1;
            }
             
            /* Định dạng các thẻ a là các menu con */
            .dropdown-content a {
                color: black;
                padding: 12px 16px;
                text-decoration: none;
                display: block;
            }
             
             
            /* Hiển thị menu, ta sẽ dùng javascript để thêm class này vào các nôi dung cần được hiển thị */
            .show {display:block;}
        </style>
    </head>
    <body>
        <div class="container">
            <h2>Freetuts.net hướng dẫn tạo Menu Dropdown</h2>
            <div class="dropdown">
                <button value="laptrinh" class="dropbtn">Lập trình</button>
                <ul id="laptrinh" class="dropdown-content">
                    <li><a href="#">PHP</a></li>
                    <li><a href="#">PHP</a></li>
                    <li><a href="#">PHP</a></li>
                    
                </ul>
            </div>
            <div class="dropdown">
                <button value="thuthuat" class="dropbtn">Thủ thuật</button>
                <ul id="thuthuat" class="dropdown-content">
                    <a href="#">Thủ thuật window</a>
                    <a href="#">Download</a>
                    <a href="#">Phần cứng</a>
                </ul>
            </div>
        </div>
    </body>
    <script>
        /* Thêm hoặc xóa class show ra khỏi phần tử */
        function myFunction(id) {
            document.getElementById(id).classList.toggle("show");
        }
        //lấy tất cả các button menu
        var buttons = document.getElementsByClassName('dropbtn');
        //lấy tất cả các thẻ chứa menu con
        var contents = document.getElementsByClassName('dropdown-content');
        //lặp qua tất cả các button menu và gán sự kiện
        for (var i = 0; i < buttons.length; i++) {
            buttons[i].addEventListener("click", function(){
                //lấy value của button
                var id = this.value;
                //ẩn tất cả các menu con đang được hiển thị
                for (var i = 0; i < contents.length; i++) {
                    contents[i].classList.remove("show");
                }
                //hiển thị menu vừa được click
                myFunction(id);
            });
        }
        //nếu click ra ngoài các button thì ẩn tất cả các menu con
        window.addEventListener("click", function(){
             if (!event.target.matches('.dropbtn')){
                for (var i = 0; i < contents.length; i++) {
                    contents[i].classList.remove("show");
                }
             }
        });
    </script>
</html>
