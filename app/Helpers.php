<?php

use App\Models\Token;

if (!function_exists('isPageActive')) {
    /**
     * Check if the current menu is the current page
     */
    function isPageActive($routeName, $startsWith = false)
    {
        $currentRouteName = request()->route()->getName();

        if ($startsWith) {
            $isActive = str_starts_with($currentRouteName, $routeName);
        } else {
            $isActive = $currentRouteName == $routeName;
        }

        return $isActive ? 'active' : '';
    }
}

if (!function_exists('getUser')) {
    /**
     * Get logged in user
     */
    function getUser()
    {
        $loginToken = Token::where('token', session('token'))->first();

        return $loginToken->user;
    }
}

if (!function_exists('convertToCurrency')) {
    /**
     * Get logged in user
     */
    function convertToCurrency($money)
    {
        return 'Rp. ' . number_format($money, 2);
    }
}
