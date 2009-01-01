<?php
		ob_start();
		session_start();
		include "connect.php";
		//SQL UPDATE decreament by agent
		//Barang / nilai akan diisi oleh admin saja
		//Karena ini bukan admin

	if($_SERVER["REQUEST_METHOD"] == "POST"){
		if(isset($_POST["go"])){
		$log = array();
		$log["status_barang"] = array();
		$id_barang = $_POST["id_barang"];
		$terjual = $_POST["terjual"]; //jumlah barang yang telah terjual
		$admin_id = $_POST["admin_id"];

		$jumlah_pertama = 0;

		$con = mysqli_connect("localhost","database","root","pertanian");
		$get_barang = "select stok_barang from barang where id_barang='".$id_barang."' and admin_id='".$admin_id."'";

		$sql_1 = mysqli_query($con, $get_barang);
		if($sql_1){
			$row = mysqli_fetch_assoc($sql_1);
			$jumlah_pertama = $row["stok_barang"]; //Menambahkan stok barang yang akan dikurangi oleh jumlah yang terjual
			$jumlah_pertama -= $terjual;


			$query = "update barang set `stok_barang`='".$jumlah_pertama."' where id_barang='".$id_barang."' and admin_id='".$admin_id."'";
			$sql = mysqli_query(mysqli_connect("localhost","database","root","pertanian"), $query);
			if($sql){
				//Mengurangi stok barang
				
				$lo["status"] = $jumlah_pertama." : Berhasil diupdate";
				array_push($log["status_barang"], $lo);
				echo json_encode($log);
				mysqli_close($cons);
			}else{
				
				$lo["status"] = $jumlah_pertama." : Gagal diupdate";
				array_push($log["status_barang"], $lo);
				echo json_encode($log);
				mysqli_close($cons);
			}
		}else{
			echo "error";
		}
	}
	}else if($_SERVER["REQUEST_METHOD"] == "GET"){
		$item = array();
		$item["barang"] = array();

		if(!$_GET["q"]){
			echo "ERROR :) ";
		}else{

		$con = mysqli_connect("localhost","database","root","pertanian");
		
		$query = "select * from barang where admin_id='".$_GET["q"]."'";

		$sql = mysqli_query($con, $query);
		if($sql){
			while ($row = mysqli_fetch_assoc($sql)) {
				$set["id_barang"] = $row["id_barang"];
				$set["nama_barang"] = $row["nama_barang"];
				$set["stok_barang"] = $row["stok_barang"];
				$set["admin_id"] = $row["admin_id"];

				array_push($item["barang"],$set);
			}
			echo json_encode($item);
		}

	}
}

	ob_end_flush();
	

?>