<?php

if(!function_exists('parse_ip'))
{
    function parse_ip($ip)
    {
        $matches = array();
        preg_match('(\d{1,3}\.\d{1,3}\.\d{1,3})', $ip, $matches);
        return $matches[0];
    }
}

if(!function_exists('parse_date_from_js'))
{
    function parse_date_from_js($date,$type)
    {
        $parsed_date = explode(' ',$date);

        if($type == "date")
        {
            $seance_date = $parsed_date[1].'-'.$parsed_date[2].'-'.$parsed_date[3];
            $result = date('Y-m-d',strtotime($seance_date));
        }
        else
        {
            $result = $parsed_date[4];
        }

        return $result;
    }
}



