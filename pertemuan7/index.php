<?php

    $npm_mhs = $_POST['npm'] ?? '';
    $nilai_mhs = $_POST['nilai'] ?? '';
    $perulangan = $_POST['ulangi'] ?? '';
    
    if($nilai_mhs != ""){
        if( $nilai_mhs >= 85){
            $huruf_mutu = 'A';
        }else if( $nilai_mhs >= 75){
            $huruf_mutu = 'B';
        }else if( $nilai_mhs >= 65){ 
            $huruf_mutu = 'C';  
        }else{
            $huruf_mutu = 'E';  
        } 

        for($x=0; $x <= $perulangan;$x++){
            echo $npm_mhs." Nilai Mata Kuliah anda adalah: " . $huruf_mutu ."<br>";
        }
    }
?>


<html>
    <header>
        <title>Form Processing</title>
    </header>
    <body>
        <form action="" method="POST">
            NPM :
            <input type="text" name="npm" value="">
            <br>
            NILAI:
            <input type="text" name="nilai" value="">
            <br>
            ULANGI:
            <input type="text" name="ulangi" value="">
            <br>
            <button type="submit" name="proses_data">
                PROSES DATA
            </button>
        </form>
    </body>
</html>
