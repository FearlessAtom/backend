<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Logger
{
    public static $FilePath = "requests.log";
    public static $TimeFormat = "m.d.Y H:i:s";
    public static $Separator = "|";
    public static $RateLimit = 5;
    public static $RateTimeLimitMinutes = 1;

    public static function GetLogs(): mixed
    {
        $lines = file(self::$FilePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        $Logs = array();

        for ($i = 0; $i < count($lines); $i++)
        {
            $data = explode(self::$Separator, $lines[$i]);

            $IpAddress = $data[0];
            $RequestTime = $data[1];

            $Logs[] = ["IpAddress" => $IpAddress, "RequestTime" => $RequestTime];
        }
        
        return $Logs;
    }

    public static function ValidateRateLimit(string $IpAddress): bool
    {
        $Logs = self::GetLogs();

        $IpLogs = array();

        for ($i = 0; $i < count($Logs); $i++)
        {
            if ($Logs[$i]["IpAddress"] == $IpAddress)
            {
                $IpLogs[] = $Logs[$i];
            }
        }

        $IpLogsWithinTime = array();

        for ($i = 0; $i < count($IpLogs); $i++)
        {
            $Difference = time() - $IpLogs[$i]["RequestTime"];

            $SecondsSince = $Difference / 60;

            if ($Difference < (60 * self::$RateTimeLimitMinutes))
            {
                $IpLogsWithinTime[] = $IpLogs[$i];
            }
        }

        return count($IpLogsWithinTime) < self::$RateLimit;
    }

    public static function AddLog(string $IpAddress, string $RequestTime): void
    {
        $file = fopen(self::$FilePath, "a+");
        fwrite($file, $IpAddress . Logger::$Separator . $RequestTime . "\n");
        fclose($file);
    }
}

$IpAddress = $_SERVER["REMOTE_ADDR"];
$RequestTime = $_SERVER["REQUEST_TIME"];

if (!Logger::ValidateRateLimit($IpAddress, $RequestTime))
{

    http_response_code(429);
    exit;
}

Logger::AddLog($IpAddress, $RequestTime);
