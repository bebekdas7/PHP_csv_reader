<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Read csv file</title>
</head>

<body>
    <h1>Read csv file and show it in tabular form</h1>
    <div class="container mt-5 border d-flex justify-content-start align-items-center">
        <form action="./csvReader.php" method="post" enctype="multipart/form-data" class="d-flex justify-content-start align-items-center">
            <input type="file" accept=".csv" name="csvFile" id="csv">
            <button type="submit" class="btn btn-sm btn-primary">Read this</button>
        </form>
    </div>

    <div class="container mt-2">
        <table class="table">
            <tbody>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (isset($_FILES["csvFile"])) {
                        $csv = $_FILES["csvFile"]["tmp_name"];
                        $fp = fopen($csv, "r");

                        while ($row = fgetcsv($fp)) {
                            echo "<tr>";
                            foreach ($row as $data) {
                                echo "<td>$data</td>";
                            }
                            echo "</tr>";
                        }

                        fclose($fp);
                    } else {
                        echo "No file uploaded.";
                    }
                }
                ?>
            </tbody>
        </table>

    </div>
</body>

</html>