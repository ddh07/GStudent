<?

class Logger
{
    private static $logFile = __DIR__ . '/../logs/app.log';

    public static function log($message, $niveau = 'INFO')
    {
        $date = date('Y-m-d H:i:s');
        $ligne = "[$date] - [$niveau] =====> $message" . PHP_EOL;
        file_put_contents(self::$logFile, $ligne, FILE_APPEND);
    }
}

?>