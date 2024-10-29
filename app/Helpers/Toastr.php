<?php

namespace App\Helpers;

class Toastr
{
    public static function success($message)
    {
        session()->flash('toastr_success', $message);
    }

    public static function error($message)
    {
        session()->flash('toastr_error', $message);
    }

    public static function warning($message)
    {
        session()->flash('toastr_warning', $message);
    }

    public static function info($message)
    {
        session()->flash('toastr_info', $message);
    }
}
