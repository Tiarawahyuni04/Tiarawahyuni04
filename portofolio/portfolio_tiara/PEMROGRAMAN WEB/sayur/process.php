<?php
// Koneksi ke database
$host = "localhost";
$username = "root";
$password = "";
$dbname = "pembelian_sayuran";

$conn = new mysqli($host, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi Gagal: " . $conn->connect_error);
}

// Fungsi Tambah Sayuran
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_sayuran = $_POST["nama_sayuran"];
    $harga = $_POST["harga"];
    $stok = $_POST["stok"];

    $sql = "INSERT INTO sayuran (nama_sayuran, harga, stok) VALUES ('$nama_sayuran', $harga, $stok)";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.html");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Fungsi Tampil Data Sayuran
$sql_select = "SELECT * FROM sayuran";
$result = $conn->query($sql_select);
$rows = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
}

$conn->close();
?>

<!-- Tampilkan data sayuran dalam tabel HTML -->
<tbody>
<?php foreach ($rows as $row) : ?>
    <tr>
        <td><?= $row["id"] ?></td>
        <td><?= $row["nama_sayuran"] ?></td>
        <td><?= $row["harga"] ?></td>
        <td><?= $row["stok"] ?></td>
        <td>
            <button onclick="editSayuran(<?= $row['id'] ?>)">Edit</button>
            <button onclick="deleteSayuran(<?= $row['id'] ?>)">Delete</button>
        </td>
    </tr>
<?php endforeach; ?>
</tbody>

<script>
    function editSayuran(id) {
        // Tambahkan logika untuk edit data
        console.log("Edit data dengan ID " + id);
    }

    function deleteSayuran(id) {
        // Tambahkan logika untuk delete data
        console.log("Hapus data dengan ID " + id);
    }
</script>
