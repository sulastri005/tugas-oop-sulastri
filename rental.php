<?php

// 1. Class Superclass (Parent) bernama Rental
class Rental
{
    // Enkapsulasi: property dibuat private
    private $hargaSewaPerHari;

    // Setter untuk menentukan harga sewa per hari
    public function setHargaSewaPerHari($harga)
    {
        $this->hargaSewaPerHari = $harga;
    }

    // Getter untuk mengambil nilai harga sewa per hari
    public function getHargaSewaPerHari()
    {
        return $this->hargaSewaPerHari;
    }

    // Method hitungDiskon dasar di parent
    public function hitungDiskon($jumlahHari)
    {
        return 0; // Default tidak ada diskon
    }
}

// 2. Class Child (Subclass) RentalMobil melakukan extends ke Rental
class RentalMobil extends Rental
{
    // 4. Method Overriding pada hitungDiskon untuk Mobil
    public function hitungDiskon($jumlahHari)
    {
        if ($jumlahHari > 3) {
            return 0.10; // Diskon 10% jika sewa lebih dari 3 hari
        }
        return 0;
    }
}

// 2. Class Child (Subclass) RentalMotor melakukan extends ke Rental
class RentalMotor extends Rental
{
    // 4. Method Overriding pada hitungDiskon untuk Motor
    public function hitungDiskon($jumlahHari)
    {
        if ($jumlahHari > 3) {
            return 0.05; // Diskon 5% jika sewa lebih dari 3 hari
        }
        return 0;
    }
}

// ==========================================
// 5. Instansiasi Object dan Pengujian
// ==========================================

echo "<h3>--- Simulasi Rental Mobil ---</h3>";
$rentalMobil = new RentalMobil();
$rentalMobil->setHargaSewaPerHari(300000); // Rp 300.000 per hari
$hariMobil = 5;

$hargaKotorMobil = $rentalMobil->getHargaSewaPerHari() * $hariMobil;
$diskonMobil = $rentalMobil->hitungDiskon($hariMobil);
$potonganMobil = $hargaKotorMobil * $diskonMobil;
$totalBayarMobil = $hargaKotorMobil - $potonganMobil;

echo "Harga per hari: Rp " . number_format($rentalMobil->getHargaSewaPerHari(), 0, ',', '.') . "<br>";
echo "Lama sewa: " . $hariMobil . " hari<br>";
echo "Diskon: " . ($diskonMobil * 100) . "%<br>";
echo "<b>Total Bayar Mobil: Rp " . number_format($totalBayarMobil, 0, ',', '.') . "</b><br>";

echo "<hr>";

echo "<h3>--- Simulasi Rental Motor ---</h3>";
$rentalMotor = new RentalMotor();
$rentalMotor->setHargaSewaPerHari(100000); // Rp 100.000 per hari
$hariMotor = 4;

$hargaKotorMotor = $rentalMotor->getHargaSewaPerHari() * $hariMotor;
$diskonMotor = $rentalMotor->hitungDiskon($hariMotor);
$potonganMotor = $hargaKotorMotor * $diskonMotor;
$totalBayarMotor = $hargaKotorMotor - $potonganMotor;

echo "Harga per hari: Rp " . number_format($rentalMotor->getHargaSewaPerHari(), 0, ',', '.') . "<br>";
echo "Lama sewa: " . $hariMotor . " hari<br>";
echo "Diskon: " . ($diskonMotor * 100) . "%<br>";
echo "<b>Total Bayar Motor: Rp " . number_format($totalBayarMotor, 0, ',', '.') . "</b>";

?>