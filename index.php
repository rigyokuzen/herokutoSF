<?
echo 'phpのテストです。<br>';

$dbinfo = parse_url(getenv('DATABASE_URL'));

$dsn = 'pgsql:host=' . $dbinfo['host'] . ';dbname=' . substr($dbinfo['path'], 1);

$pdo = new PDO($dsn, $dbinfo['user'], $dbinfo['pass']);
var_dump($pdo->getAttribute(PDO::ATTR_SERVER_VERSION));

$result = pg_query('SELECT * FROM users where email =\'hina3588@bbap.ll\'');
if (!$result) {
    die('クエリーが失敗しました。'.pg_last_error());
}
var_dump($result);
?>
