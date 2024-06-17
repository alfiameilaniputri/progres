<?php
    // $var1 = $_GET['inputan_pertama'] ?? '';
    // echo $var1;
?>


<!-- <html>
    <header>
        <title>
        </title>
    </header>

        <body>
            <form action="" method="GET">
                <input type="text" name="inputan_pertama" value=""\>
                <button type="submit" name="proses_data">
                PROSES DATA
                </button>



            </form>
        </body>
</html> -->

<?php
    $var1 = $_POST['inputan_pertama'] ?? '';
    echo $var1;
?>


<html>
    <header>
        <title>
        </title>
    </header>

        <body>
            <form action="" method="POST">
                <input type="text" name="inputan_pertama" value=""\>
                <button type="submit" name="proses_data">
                PROSES DATA
                </button>



            </form>
        </body>
</html>