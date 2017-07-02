<?php
	// 送信データ取得
    $time = $_POST['sendData'];

	// logデータを取得
	$log = [];
	$l_row = 0;
	$fp = fopen('score.log', 'r');
	while (($data = fgets($fp)) !== false){
		$data 	= rtrim($data);
		$log[$l_row] = $data;
		$l_row++;
	}
	fclose($fp);

	// 代理の値の入力
	while ($l_row < 5){
		$log[$l_row] = 999999;
		$l_row++;
	}

	// 今回のタイムを配列に
	$l_row++;
	$log[$l_row] = $time;

	// 配列をソート（昇順）
	sort($log);

	// Top5を抽出しlogに書き込み
	$resultl = [];
	$fp = fopen('score.log', 'w');
	for($i = 0; $i < 5; $i++){
		fwrite($fp, $log[$i]);
		fwrite($fp, "\n");
		$resultl[$i] = $log[$i];
	}
	fclose($fp);
   
	// json形式に変換し出力
	$json = json_encode($resultl);
    print $json;