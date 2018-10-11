<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;

//delayed function must return a string
if(empty($arResult))
	return "";

$strReturn = '';

$strReturn .= '<div class="breadcrumbs"><div class="container"><ul class="breadcrumbs-list">';

$itemSize = count($arResult);
for($index = 0; $index < $itemSize; $index++)
{
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);
	$arrow = ($index > 0? '<i class="fa fa-angle-right"></i>' : '');

	if($arResult[$index]["LINK"] <> "" && $index != $itemSize-1)
	{
		$strReturn .= '<li><a href="'.$arResult[$index]["LINK"].'">'.strtolower($title).' </a></li>';
	}
	else
	{
		$strReturn .= '<li>&nbsp;'.strtolower($title).'</li>';
	}
}

$strReturn .= '</ul></div></div>';

return $strReturn;
