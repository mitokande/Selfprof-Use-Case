<?php
$oldPhone = "";
if(isset($_POST['phone_update'])){
    $oldPhone = $_POST['phone_update'];
    $selectedname = $_POST['name'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="toastr.css">
    <title>Güncelle</title>
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
        <h1>Numara Güncelle</h1>
        <div class="rwd-table">
            <form method="post" class="update-form">
                Kullanıcı İsmi: <input type="text" name="isim" id="name" value="<?php echo $selectedname; ?>" readonly>
                Seçili Numara:<input type="text" value="<?php echo $oldPhone; ?>" name="old_phone" id="old_phone" readonly>
                Yeni Numara:<input type="text" name="phone" id="new_phone">
                <input type="submit" value="Güncelle">
            </form>
        </div>

    </div>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="./lib/toastr.js"></script>
    <script>

        $(document).ready(function () {
            
        });
        $(".update-form").on('submit', function (e) {
            var oldnumber = $("#old_phone").val();
            var newnumber = $("#new_phone").val();

            e.preventDefault();
            $.ajax({
                url:"./lib/edit.php",
                type:"POST",
                data:{oldNo:oldnumber,newNo:newnumber},
                success:function(data){
                    console.log(data);
                    if(data == '"success"'){
                        window.location.replace("./list.php");
                    }else if(data == '"error1"'){
                        toastr.warning('Numara Formatı Hatalı','Hata');
                    }else if(data == '"error2"'){
                        toastr.warning('Numara Rehberde Kayıtlı','Hata');

                    }
                }
            });
        });

    </script>
    <script type="text/javascript" language="javascript" src="./lib/libphonenumber-js.min.js"></script>
   <script type="text/javascript">
     //Tel input formatlama 
     $("#new_phone").keyup(function () {
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