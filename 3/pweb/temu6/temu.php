<?php
$merk = array('motorola', 'nokiann', 'samsung', 'sony', 'oppo', 'xiaomi');

echo "Saya menyukai HP dengan merk $merk[2]";

$datadiri = ["nama" => "Khenjy Johnelson", "alamat" => "Pasaman Padang",
"pekerjaan" => "pengajar",
"status" => "belum menikah",
"email" => "khenjyjohnelson@gmail.com",
"hp" => "081234567899",
];

echo "<h2>Nama :".$datadiri["nama"]."</h2>";
echo "<h2>Alamat :".$datadiri["alamat"]."</h2>";
echo "<h2>Status :".$datadiri["status"]."</h2>";
echo "<h2>Email :".$datadiri["email"]."</h2>";
?>