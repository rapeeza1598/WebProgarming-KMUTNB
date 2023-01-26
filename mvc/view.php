<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        div {
            display: block;
            width: 200px;
        }
    </style>
</head>

<body>
    <?php
    $show = "Show";
    include_once 'control.php';
    ?>
    <table border="1">
        <tr>
            <th>ISBN</th>
            <th>ชื่อหนังสือ</th>
            <th>ประเภทหนังสือ</th>
            <th>ราคาจำหนาย</th>
            <th>จำนวน</th>
            <th>วันที่แก้ไขข้อมูลหนังสือ</th>
            <th>Operation</th>
        </tr>
    <?php
    foreach ($book_data as $book) {
        foreach($book as $col){
            echo "<td>{$col}</td>";
        }
        echo "<td><a href = ''>Edit</a> | <a href = ''>Del</a></td>";
        echo "</tr>";
    }
    ?>
    </table>
    <div>
        <form action="./control.php" method="post">
            <h3>รหัสหนังสือ</h3>
            <input type="text" name="ISBN" id="" placeholder="รหัสหนังสือ" require>
            <h3>ชื่อหนังสือ</h3>
            <input type="text" name="bookname" id="" placeholder="รหัสหนังสือ" require>
            <h3>ประเภทหนังสือ</h3>
            <select name="Type" id="" require>
                <?php
                $option = ["บันเทิง", "วิทยาศาสตร์", "บันเทิง", "วิชาการ", "อื่นๆ"];
                foreach ($option as $opt) {
                ?>
                    <option value="<?= $opt; ?>"><?= $opt; ?></option>
                <?php } ?>
            </select>
            <h3>ราคานำหน่าย</h3>
            <input type="text" name="Price" id="" placeholder="ราคา" require>
            <h3>จำนวน</h3>
            <input type="text" name="Qty" id="" placeholder="จำนวน(เล่ม)" require>
            <button type="submit" name="save">เพืิ่มหนังสือ</button>
        </form>
    </div>
</body>

</html>