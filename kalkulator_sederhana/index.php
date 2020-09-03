<?php 
	// Memberi nilai default kosong pada variabel bil_1 dan bil_2
	$bil_1 = $bil_2 = 0;

	//	Memberi kondisi jika halaman melakukan permintaan pada halaman server dengan metode POST
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		$bil_1 = $_POST["bilangan1"];
		$bil_2 = $_POST["bilangan2"];
	}

    /*
		* @desc method digunakan untuk cek apakah input adalah bilangan (valid)
		* @param $nilai1 berisi bilangan1 dalam bentuk integer/float
		* @param $nilai2 berisi bilangan1 dalam bentuk integer/float
		* @return $valid berisi hasil cek bilangan dalam bentuk boolean
	*/
    function cek_nilai($nilai1, $nilai2){
        $valid = false;
        if($nilai1>0 || $nilai2>0 || $nilai1<0 || $nilai2<0){
            if($nilai1 == "" || $nilai2 == ""){
                $valid = false;
            }
            else{
                $valid = true;
            }
        }
        else{
            $valid = false;
        }
        return $valid;
    }

	/*
		* @desc method digunakan untuk menjumlahkan 2 bilangan
		* @param $nilai1 berisi bilangan1 dalam bentuk integer/float
		* @param $nilai2 berisi bilangan1 dalam bentuk integer/float
		* @return $hasil berisi hasil penjumlahan dalam bentuk integer/float
	*/
	function penjumlahan($nilai1 = 0, $nilai2 = 0){
		$hasil = 0;
        if(cek_nilai($nilai1, $nilai2) == true){
            $hasil = $nilai1 + $nilai2;
            $hasil = round($hasil,2);
        }
        else{
            $hasil = 0;
        }
		return $hasil;
	}



	/*
		* @desc method digunakan untuk mengurangi 2 bilangan
		* @param $nilai1 berisi bilangan1 dalam bentuk integer/float
		* @param $nilai2 berisi bilangan1 dalam bentuk integer/float
		* @return $hasil berisi hasil pengurangan dalam bentuk integer/float
	*/
	function pengurangan($nilai1 = 0, $nilai2 = 0){
        $hasil = 0;
        if(cek_nilai($nilai1, $nilai2) == true){
            $hasil = $nilai1 - $nilai2;
            $hasil = round($hasil,2);
        }
        else{
            $hasil = 0;
        }
		return $hasil;
	}


	/*
		* @desc method digunakan untuk mengalikan 2 bilangan
		* @param $nilai1 berisi bilangan1 dalam bentuk integer/float
		* @param $nilai2 berisi bilangan1 dalam bentuk integer/float
		* @return $hasil berisi hasil perkalian dalam bentuk integer/float
	*/
	function perkalian($nilai1 = 0, $nilai2 = 0){
        $hasil = 0;
        if(cek_nilai($nilai1, $nilai2) == true){
            $hasil = $nilai1 * $nilai2;
            $hasil = round($hasil,2);
        }
        else{
            $hasil = 0;
        }
		return $hasil;
	}


	/*
		* @desc method digunakan untuk membagi bilangan1 dengan bilangan2
		* @param $nilai1 berisi bilangan1 dalam bentuk integer/float
		* @param $nilai2 berisi bilangan1 dalam bentuk integer/float
		* @return $hasil berisi hasil pembagian dalam bentuk integer/float
	*/
	function pembagian($nilai1 = 0, $nilai2 = 0){
        $hasil = 0;
        if(cek_nilai($nilai1, $nilai2) == true){
            $hasil = $nilai1 / $nilai2;
            $hasil = round($hasil,2);
        }
        else{
            $hasil = 0;
        }
		return $hasil;
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Sederhana</title>
    
    <!-- link css bootstrap -->
    <link rel="stylesheet" href="bootstrap.min.css">
    
    <!-- link css style(costum) -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="judul text-center">
        <h1>Kalkulator Sederhana</h1>
    </div>
    

    <!-- Container Form Kalkulator Input Bilangan -->
    <div class="container kalkulator">
        
        <!--Form Input Bilangan -->
        <form class="align-middle" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            
            <!-- Form Input Bilangan 1 -->
            <div class="form-group row justify-content-between">
                
                <!-- Label Input Bilangan 1 -->
                <label for="bilangan1" class="col-sm-2 col-form-label">Bilangan 1</label>
                
                <div class="col-sm-4">
                <!-- Text Box Input Bilangan 1 dengan tipe input nomor/angka, mendukung angka belakang koma sampai 11 angka dan placehoolder dari nilai $bil_1 -->
                    <input type="number" step="0.00000000001" class="form-control text-right" id="bilangan1" placeholder="<?php echo $bil_1 ?>" name="bilangan1">
                </div>
            </div>

            <!-- Form Input Bilangan 2 -->
            <div class="form-group row justify-content-between">

                <!-- Label Input Bilangan 2 -->
                <label for="bilangan2" class="col-sm-2 col-form-label">Bilangan 2</label>

                <div class="col-sm-4">
                    <!-- Text Box Input Bilangan 2 dengan tipe input nomor/angka, mendukung angka belakang koma sampai 11 angka dan placehoolder dari nilai $bil_2 -->
                    <input type="number" step="0.0000000001" class="form-control text-right" id="bilangan2" placeholder="<?php echo $bil_2 ?>" name="bilangan2">
                </div>
            </div>

            <!-- Tombol Submit Dengan Isi Text Hitung -->
            <button type="submit" class="btn btn-primary col-12">Hitung</button>
        </form>
    </div>

    <!-- Container Untuk Hasil Kalkulator -->
    <div class="container">

        <!-- Tempat judul hasil -->
        <div class="judul-hasil">
            <!-- Text judul hasil -->
            <h3>Hasil Kalkulator</h3>
        </div>

        <!-- Baris Hasil Untuk Box Penjumlahan dan Pengurangan -->
        <div class="row">
            <div class="col-sm-6">
                <div class="card text-white bg-success mb-3">
                    <!-- Judul Box Penjumlahan -->
                    <div class="card-header">Penjumlahan</div>
                        <!-- Hasil Penjumlahan -->
                    <div class="card-body">
                        <h5 class="card-text text-right"><?php echo penjumlahan($bil_1, $bil_2) ?></h5>
                    </div>
                </div>
            </div>
            
            <div class="col-sm-6">
                <div class="card text-white bg-danger mb-3">
                    <!-- Judul Box Pengurangan -->
                    <div class="card-header">Pengurangan</div>
                    <div class="card-body">
                        <!-- Hasil Pengurangan -->
                        <h5 class="card-text text-right"><?php echo pengurangan($bil_1, $bil_2) ?></h5>
                    </div>
                </div>
            </div>
        </div>

        <!-- Baris Hasil Untuk Box Perkalian dan Pembagian -->
        <div class="row">
            <div class="col-sm-6">
                <div class="card text-white bg-warning mb-3">
                    <!-- Judul Box Perkalian -->
                    <div class="card-header">Perkalian</div>
                    <div class="card-body">
                        <!-- Hasil Perkalian -->
                        <h5 class="card-text text-right"><?php echo perkalian($bil_1, $bil_2) ?></h5>
                    </div>
                </div>
            </div>
            
            <div class="col-sm-6">
                <div class="card text-white bg-info mb-3">
                    <!-- Judul Box Pembagian -->
                    <div class="card-header">Pembagian</div>
                    <div class="card-body">
                        <!-- Hasil Pembagian -->
                        <h5 class="card-text text-right"><?php echo pembagian($bil_1, $bil_2) ?></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>