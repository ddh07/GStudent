<?
class MyLogger{
    private static $logFile = __DIR__ . '/../logs/app.log';
    private $logs = [];

    public static function log($message, $niveau = 'INFO'){
        $date = date('Y-m-d H:i:s');
        $ligne = "[$date] - [$niveau] =====> $message" . PHP_EOL;
        file_put_contents(self::$logFile, $ligne, FILE_APPEND);
    }

    public static function filtreLog($search,$date_filter,$level_filter) :mixed {
        if (file_exists(self::$logFile)) {
            $lines = file(self::$logFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

            foreach ($lines as $line) {
                if (preg_match('/^\[(.*?)\] - \[(.*?)\] =====> (.*)$/', $line, $matches)) {
                    $timestamp = $matches[1];
                    $level = strtoupper(trim($matches[2]));
                    $message = $matches[3];

                    // Filtrage
                    $matchSearch = $search === '' || stripos($message, $search) !== false || stripos($level, $search) !== false;
                    $matchDate = $date_filter === '' || str_starts_with($timestamp, $date_filter);
                    $matchLevel = $level_filter === '' || $level_filter === $level;

                    if ($matchSearch && $matchDate && $matchLevel) {
                        self::$logs[] = [
                            'timestamp' => $timestamp,
                            'level' => $level,
                            'message' => $message
                        ];
                    }
                }
            }
            return self::$logs;
        }else{
            return false;
        }
        
    }

    static function getNiveauLog():array {
        $niveau = [];
            if (file_exists(self::$logFile)) {
                $lines = file(self::$logFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                foreach ($lines as $line) {
                    if (preg_match('/^\[.*?\] - \[(.*?)\]/', $line, $matches)) {
                        $niveau[] = strtoupper(trim($matches[1]));
                    }
                }
            }
        return array_unique($niveau);
    }

    public static function getLogContrnt(){
        $logs = [];
        if (file_exists(self::$logFile)) {
            $lines = file(self::$logFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

            foreach ($lines as $line) {
                if (preg_match('/^\[(.*?)\] - \[(.*?)\] =====> (.*)$/', $line, $matches)) {
                    $logs[] = [
                        'timestamp' => $matches[1],
                        'level'     => $matches[2],
                        'message'   => $matches[3]
                    ];
                }
            }
            return $logs;
        }
    }
}
?>