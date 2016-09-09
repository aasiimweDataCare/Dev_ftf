<?php
/**
 * Created by PhpStorm.
 * User: aasiimwe
 * Date: 11/4/2015
 * Time: 11:05 PM
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('asset_url()'))
{
    function asset_url()
    {
        return base_url().'assets/';
    }
}


if ( ! function_exists('page_url()'))
{
    function page_url()
    {
        return base_url().'pages/';
    }
}


if ( ! function_exists('dev_cpm_url()'))
{
    function dev_cpm_url()
    {
        return base_url().'Dev_CPM/';
    }
}