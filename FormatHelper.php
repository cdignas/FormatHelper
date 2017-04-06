<?php
/**
 * Author: Christian Dignas [christian.dignas@gmail.com]
 * Authors-Website: http://christian-dignas.de/
 *
 * @Copyright: Christian Dignas
 */
App::uses('AppHelper', 'View/Helper');

class FormatHelper extends AppHelper{

    /**
     * Return the formatted Date. Standard Format is Day Month Year
     *
     * @param $date             Date to Format
     * @param string $format    Format which Date should Formatted
     * @return string           Formatted Date
     */
    public function formatDate($date, $format = "d.m.Y") {
        $dateTime = new DateTime($date);
        return $dateTime->format($format);
    }

    /**
     * Format and Round Bytes with Units
     *
     * @param $bytes            Bytes
     * @param int $precision    Precision for Round
     * @return string           Rounded Bytes
     */
    public function formatBytes($bytes, $precision = 2) {
        $unit = array("b", "kb", "mb", "gb");
        $exp = floor(log($bytes, 1024)) | 0;
        return round($bytes / (pow(1024, $exp)), $precision).$unit[$exp];
    }

    /**
     * Get the Status Text for the given Status ID
     *
     * @param $statusId     Status ID
     * @return string       Status Text
     */
    public function getStatusString($statusId) {
        return ($statusId == Status::ACTIVE)
                    ? "Active"
                    : "Inactive";
    }

    /**
     * @param $date
     * @param string $prefix
     * @return string
     */
    public function getDay($date, $prefix = ""){
        $dateTime = new DateTime($date);
        return $prefix . $dateTime->format("d");
    }

    /**
     * Return Month of Date
     *
     * @param $date     Date
     * @return string   Month
     */
    public function getMonth($date){
        $dateTime = new DateTime($date);
        return $dateTime->format("m");
    }

    /**
     * Return Year of Date
     *
     * @param $date     Date
     * @return string   Year
     */
    public function getYear($date){
        $dateTime = new DateTime($date);
        return $dateTime->format("Y");
    }

    /**
     * Return Time of Date
     *
     * @param $date     Date
     * @return string   Time
     */
    public function formatDateTime($date) {
        $dateTime = new DateTime($date);
        return $dateTime->format("M j, Y, h:ia");
    }

    /**
     * return date in German Format
     *
     * @param $date     Date
     * @return string   Date
     */
    public function toGermanDate($date) {
        $dateTime = new DateTime($date);
        return $dateTime->format("d.m.Y");
    }

    /**
     * Return Date in German Format with Time
     *
     * @param $date     Date
     * @return string   Date
     */
    public function toGermanDateWithTime($date) {
        $dateTime = new DateTime($date);
        return $dateTime->format("d.m.Y h:i") . " Uhr";
    }

    /**
     * Get Date in German Format with Weekday
     *
     * @param $date     Date
     * @return string   Date
     */
    public function toGermanDateWithWeekday($date) {
        $dateTime = new DateTime($date);
        $day = $dateTime->format("w");

        switch ($day) {
            case 0:
                $weekday = "So";
                break;
            case 1:
                $weekday = "Mo";
                break;
            case 2:
                $weekday = "Di";
                break;
            case 3:
                $weekday = "Mi";
                break;
            case 4:
                $weekday = "Do";
                break;
            case 5:
                $weekday = "Fr";
                break;
            case 6:
                $weekday = "Sa";
                break;
        }
        return $weekday . " " . $dateTime->format("d.m.Y");
    }

    /**
     * Return Date with Full Month
     *
     * @param $date     Date
     * @return string   Date
     */
    public function toGermanDateWithFullMonth($date) {
        $dateTime = new DateTime($date);
        $month = $dateTime->format("n");
        $month = $this->translateMonthToGerman($month);
        return $dateTime->format("d.") . " " . $month;
    }

    /**
     * Return Date without Year
     *
     * @param $date     Date
     * @return string   Date
     */
    public function toGermanDateWithoutYear($date) {
        $dateTime = new DateTime($date);
        return $dateTime->format("d.F");
    }

    /**
     * Return Date with full Month and Year
     *
     * @param $date     Date
     * @return string   Date
     */
    public function toGermanDateWithoutDay($date) {
        $dateTime = new DateTime($date);
        $month = $dateTime->format("n");
        $month = $this->translateMonthToGerman($month);
        return $month . " " . $dateTime->format(" Y");
    }

    /**
     * Return Time in German Format with Hours and minutes
     *
     * @param $date     Date
     * @return string   Time
     */
    public function toGermanTime($date) {
        $dateTime = new DateTime($date);
        return $dateTime->format("H:i");
    }

    /**
     * Format Phone Number to German Format
     *
     * @param $number       Phone Number
     * @return string       Phone Number
     */
    public function toGermanPhoneFormat($number) {
        $phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();
        try {
            $germanNumberProto = $phoneUtil->parse($number, "DE");
            return $phoneUtil->format($germanNumberProto, \libphonenumber\PhoneNumberFormat::NATIONAL);
        } catch (\libphonenumber\NumberParseException $e) {
            var_dump($e);
        }
    }

    /**
     * Return URL with http if is it not given.
     *
     * @param $url              URL
     * @return mixed|string     URL
     */
    public function formatURL($url) {
        $http = preg_match('/http:\/\//', $url);
        if($http === 1) {
            return str_replace(' ', '', $url);
        } else {
            return 'http://' . str_replace(' ', '', $url);
        }
    }

    /**
     * Return URL without http if is it given.
     *
     * @param $url      URL
     * @return mixed    URL
     */
    public function removeHTTP($url) {
        $http = preg_match('/http:\/\//', $url);
        if($http === 1) {
            return str_replace('http://', '', $url);
        } else {
            return $url;
        }
    }

    /**
     * Translate English Month Names to German
     *
     * @param $englishMonth     English Month
     * @return string           German Month
     */
    public function translateMonthToGerman($englishMonth){
        $germanMonth = $englishMonth;

        switch ($englishMonth) {
            case 1:
                $germanMonth = "Januar";
                break;
            case 2:
                $germanMonth = "Februar";
                break;
            case 3:
                $germanMonth = "März";
                break;
            case 4:
                $germanMonth = "April";
                break;
            case 5:
                $germanMonth = "Mai";
                break;
            case 6:
                $germanMonth = "Juni";
                break;
            case 7:
                $germanMonth = "Juli";
                break;
            case 8:
                $germanMonth = "August";
                break;
            case 9:
                $germanMonth = "September";
                break;
            case 10:
                $germanMonth = "Oktober";
                break;
            case 11:
                $germanMonth = "November";
                break;
            case 12:
                $germanMonth = "Dezember";
                break;
        }
        return $germanMonth;
    }

    /**
     * Show Newer Date
     *
     * @param null $firstDate       First Date
     * @param null $secondDate      Second Date
     * @return string               Newer Date
     */
    public function showNewerDate($firstDate = null, $secondDate = null) {
        $date = '';
        $dateTimeFirst = new DateTime($firstDate);
        $dateTimeSecond = new DateTime($secondDate);
        if($firstDate != null && $secondDate != null) {
            if($dateTimeFirst->diff($dateTimeSecond)->invert > 0) {
                $date = $dateTimeFirst->format("d.m.Y h:i");
            } else {
                $date = $dateTimeSecond->format("d.m.Y h:i");
            }
        } else {
            if($firstDate == null) {
                $date = $dateTimeSecond->format("d.m.Y h:i");
            } else {
                $date = $dateTimeFirst->format("d.m.Y h:i");
            }
        }
        return $date;
    }

    /**
     * Return Age from the Date
     *
     * @param null $bithdayDate     Date
     * @return int                  Age
     */
    public function getAge($bithdayDate = null) {
        $date = new DateTime($bithdayDate);
        $now = new DateTime();
        $interval = $now->diff($date);
        return $interval->y;
    }

    /**
     * Return the Last Login
     *
     * @param $date     Date
     * @return string   Last login
     */
    public function getLastLogin($date) {
        $date = new DateTime($date);
        $now = new DateTime();
        $diff = $now->diff($date);

        // YEARS
        if($diff->y == 1) {
            return 'vor einem Jahr';
        } else if($diff->y > 1) {
            return 'vor Jahren';
        }

        // MONTHS
        if($diff->m == 1) {
            return 'vor einem Monat';
        } elseif($diff->m > 1) {
            return 'vor Monaten';
        }

        // DAYS
        if($diff->d > 20) {
            return 'vor 3 Wochen';
        } elseif($diff->d > 13) {
            return 'vor 2 Wochen';
        } elseif($diff->d > 6) {
            return 'vor einer Woche';
        } elseif($diff->d > 2) {
            return 'vor ' . $diff->d  . ' Tagen';
        }

        switch($diff->days) {
            case 0:
                return 'Heute';
                break;
            case 1:
                return 'Gestern';
                break;
            case 2:
                return 'Vorgestern';
                break;
        }
    }
}