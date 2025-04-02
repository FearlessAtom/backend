<?php

class Logger
{
    public static $FilePath = "requests.log";
    public static $TimeFormat = "m.d.Y H:i:s";
    public static $Separator = "|";
    public static $RateLimit = 5;
    public static $RateTimeLimitMinutes = 1;
    public static $LogKeepTimeMinutes = 1;
    public static $DoLogCleanup = true;

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
        self::CleanLogs();

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

    public static function CleanLogs(): void
    {
        if (!self::$DoLogCleanup) return;

        $Logs = self::GetLogs();

        $FilteredLogs = array();

        for ($i = 0; $i < count($Logs); $i++)
        {
            $Difference = time() - (int)$Logs[$i]["RequestTime"];

            if (($Difference / 60) > self::$LogKeepTimeMinutes)
            {
                continue;
            }

            $FilteredLogs[] = $Logs[$i];
        }

        $file = fopen(self::$FilePath, "w");
       
        for ($i = 0; $i < count($FilteredLogs); $i++)
        {
            fwrite($file, $FilteredLogs[$i]["IpAddress"] . self::$Separator . $FilteredLogs[$i]["RequestTime"] . "\n");
        }

        fclose($file);
    }
}
