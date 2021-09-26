<pre><?php
# import
require_once "../vendor/autoload.php";
use GuzzleHttp\Client;

# HTTP Request URL
$method = 'GET';
$url = 'http://api.e-stat.go.jp/rest/3.0/app/json/getStatsList';
#$url = 'http://api.e-stat.go.jp/rest/3.0/app/json/getStatsData';

# query
$key = '6c23305046533959414acea9ab38922b35a74f01';
#$statId = '0003288322';
$count = 1;

$query = [
	'appId' => $key,
#	'statsDataId' => $statId
	'limit' => $count,
	'searchWord' => '東京 AND 人口'
];

# 出力CSVファイル名
$csvname = 'statistics_list.csv';

# get response
function write_data_to_csv(){
	global $method, $url, $query, $csvname;
	$data = [];
	$client = new Client();

	try{
# HTTP Requestを実行してresponseを取得
		$json = $client->request($method, $url, ['query' => $query])->getBody();
	}catch(Exception $e){
		var_dump($e);
		return;
	}

# JSONを連想配列型に解析する
	$response = json_decode($json, true);

# 初めて取得するAPIの場合、いったん中身を確認する
# var_dump($response);
# return;

# このAPI向けのエラーチェック
	switch($response['GET_STATS_DATA']['RESULT']['STATUS']){
		case 0:
			break;
		case 1:
			echo '取得データが0件です';
			return;
		default:
			echo $response['GET_STATS_DATA']['RESULT']['ERROR_MSG'];
			return;
	}

# ファイルを開く(上書き) or 新規作成
	$handle = fopen($csvname, 'wb');

# とってきたデータの必要な部分をCSVに書き出す
	$response = $response['GET_STATS_DATA']['STATISTICAL_DATA'];

	if($response['RESULT_INF']['TO_NUMBER'] - $response['RESULT_INF']['FROM_NUMBER'] > 0){
		foreach($response['DATA_INF']['VALUE'] as $res){
			$data[] = $res;
# 行ごとに書き出す
			fputcsv($handle, $res);
		}
	}else{
		$data[] = $response['DATA_INF']['VALUE'];
		fputcsv($handle, $response['DATA_INF']['VALUE']);
	}

# ファイルを閉じる
	fclose($handle);

# 中身の確認出力(ページに表示)
	var_dump($data);
}

# ここで↑のfunctionを呼び出し
write_data_to_csv();

?></pre>