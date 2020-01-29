<?
echo 'phpのテストです。<br>';

$dbinfo = parse_url(getenv('DATABASE_URL'));

$dsn = 'pgsql:host=' . $dbinfo['host'] . ';dbname=' . substr($dbinfo['path'], 1);

$pdo = new PDO($dsn, $dbinfo['user'], $dbinfo['pass']);
var_dump('DB情報　：'.$pdo->getAttribute(PDO::ATTR_SERVER_VERSION));


$conn = 'host='.$dbinfo['host'].' dbname='.substr($dbinfo['path'], 1).' user='.$dbinfo['user'].' password='.$dbinfo['pass'];
$link = pg_connect($conn);
if (!$link) {
    die('接続失敗です。'.pg_last_error());
}
$result = pg_query('SELECT * FROM users where email =\'hina3588@bbap.ll\'');
if (!$result) {
    die('クエリーが失敗しました。'.pg_last_error());
}
echo "<br />";
$rows = pg_fetch_array($result, NULL, PGSQL_NUM);
print('ユーザ名　：'.$rows[9]);
print('名前　：'.$rows[1].$rows[2]);
?>
