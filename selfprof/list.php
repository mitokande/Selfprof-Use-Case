<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="toastr.css" rel="stylesheet"/>
    <title>Listele</title>
</head>

<body>
    <!-- Sidebar -->
  <div id="sidebar">
    <header>
      <a href="./">Telefon Rehberi</a>
    </header>
    <ul class="nav">
    <li>
        <a href="./index.html">
           Rehber Ana Sayfa
        </a>
      </li>
      <li>
        <a href="./add.php">
           Numara Ekle
        </a>
      </li>
      <li>
        <a href="./list.php">
           Numara Listele
        </a>
      </li>
    </ul>
  </div>
  <!-- Sidebar End -->
    <div class="list">
        <h1>Numara Listesi</h1>
        <table class="rwd-table">
            <tr>
                <th>Id</th>
                <th>Numara</th>
                <th>İşlem</th>
            </tr>




        </table>

    </div>
    <div class="pagination"></div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="./lib/toastr.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.17/dist/sweetalert2.all.min.js"></script>

    <script>

        $(document).ready(function () {
            var count = 0;

            counter(1);
            
        });

        function counter(pagenum){
            $.ajax({
                url: "./lib/list.php",
                type: "POST",
                data: { count: true },
                success: function (data) {
                    count = JSON.parse(data);
                    count = count[0]["0"];
                    page(pagenum, count);

                }
            });
        }


    </script>
    <script>
        var currentpage = 1;
        function del(e, count) {
            // alert("del"+e);
            Swal.fire({
            title: 'Bu numarayı silmek istediğinizden emin misiniz?',
            showDenyButton: true,
            confirmButtonText: 'Sil',
            denyButtonText: `Silme`,
            }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                // Swal.fire('Saved!', '', 'success')
                $.ajax({
                url: "./lib/list.php",
                type: "POST",
                data: { delete: e },
                success: function (data) {
                    console.log(data);
                    counter(currentpage);
                    //page(currentpage, count);

                    toastr.success('Silme', 'Numara Silindi: '+e);


                }
            });
            } else if (result.isDenied) {
                
            }
            })
            
        }
        function page(e, count) {
            // alert("page"+e);
            currentpage = e;
            
            console.log(e);
            e = (e - 1) * 5;
            $.ajax({
                url: "./lib/list.php",
                type: "POST",
                data: { page: e },
                success: function (data) {
                    data = JSON.parse(data);
                    $(".rwd-table").empty();
                    $(".rwd-table").append("<tr><th>Id</th><th>Ad</th><th>Numara</th><th>İşlem</th></tr>");
                    for (var i = 0; i < data.length; i++) {
                        $(".rwd-table").append("<tr><td>" + data[i].id + "</td><td>" + data[i].isim + "</td><td>" + data[i].phone_number + "</td><td><button onclick='del(" + data[i].id + "," + count + ")' id='" + data[i].id + "'><img src='./lib/remove.png'></button></td>"+
                        "<td><form action='./edit.php' method='post'><input type='hidden' value='"+data[i].phone_number+"' name='phone_update'><input type='hidden' value='"+data[i].isim+"' name='name'><button type='submit'><img src='./lib/edit.png'></button></form></td></tr>")
                    }
                    $(".pagination").empty();
                    for (var i = 0; i < count; i += 5) {
                        $(".pagination").append("<div class='page' onclick='page(" + ((i / 5) + 1) + "," + count + ")' >" + ((i / 5) + 1) + "</div>");
                    }
                    $(".pagination").children().eq(currentpage-1).css("background-color","#ccc");

                }
            });
        }
    </script>
</body>

</html>