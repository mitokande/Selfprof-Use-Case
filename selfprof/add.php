<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="toastr.css" rel="stylesheet"/>

    <title>Telefon Numarası Ekle</title>
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
    
    <div class="add-list">
        <h1>Numara Ekle</h1>
        <div class="rwd-table">
        <form id="add-form" class="add-form" method="post">
            İsim:
            <input id="isim" type="text" name="name">
            Numara:
            <input id="tel_no" type="text" name="tel_no">
            <input type="submit" value="Telefon Numarası Ekle">
        </form>
        </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="./lib/toastr.js"></script>
    <script>
        $('#add-form').on('submit', function (e) {

            var tel = $("#tel_no").val();
            var ad = $("#isim").val();

            e.preventDefault();

            console.log(tel);
            $.ajax({
                url: "./lib/post_tel.php",
                type: "POST",
                data: { tel_no: tel,name:ad },
                success: function (data) {
                    console.log(data);
                    if(data == '"success"'){
                        toastr.success('Numara Eklendi',tel);
                    }else if(data == '"error1"'){
                        toastr.warning('Numara Sistemde Kayıtlı','Hata');
                    }
                    else if(data == '"error2"'){
                        toastr.warning('Rehbere numarayı kaydedebilmek için isim yazınız','Hata');
                    }else if(data == '"error3"'){
                        toastr.warning('Numara formatı hatalı.','Hata');

                    }
                }
            });
        });
    </script>
    
   <script type="text/javascript" language="javascript" src="./lib/libphonenumber-js.min.js"></script>
   <script type="text/javascript">
     //Tel input formatlama 
     $("#tel_no").keyup(function () {
            var val_old = $(this).val();
            if(val_old.charAt(0) != "+"){
              val_old = "+"+val_old;
            }
            var newString = new libphonenumber.AsYouType('TR').input(val_old);
            $(this).focus().val('').val(newString);
    });
</script>
</body>

</html>