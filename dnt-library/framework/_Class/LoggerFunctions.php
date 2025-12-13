<?php

/**
 * Globálne funkcie pre Logger
 * 
 * Tieto funkcie sú dostupné v celom kóde bez potreby importovať Logger triedu
 */

use DntLibrary\Base\Logger;

/**
 * Logovanie exception/error/warning/notice/deprecated
 * 
 * @param string $message Správa na logovanie
 * @param array $context Dodatočný kontext (voliteľné)
 */
function dnt_log_exception(string $message, array $context = []): void
{
    Logger::getInstance()->exception($message, $context);
}

/**
 * Logovanie info správ
 * 
 * @param string $message Správa na logovanie
 * @param array $context Dodatočný kontext (voliteľné)
 */
function dnt_log_info(string $message, array $context = []): void
{
    Logger::getInstance()->info($message, $context);
}

/**
 * Logovanie warning
 * 
 * @param string $message Správa na logovanie
 * @param array $context Dodatočný kontext (voliteľné)
 */
function dnt_log_warning(string $message, array $context = []): void
{
    Logger::getInstance()->warning($message, $context);
}

/**
 * Logovanie error
 * 
 * @param string $message Správa na logovanie
 * @param array $context Dodatočný kontext (voliteľné)
 */
function dnt_log_error(string $message, array $context = []): void
{
    Logger::getInstance()->error($message, $context);
}

/**
 * Logovanie notice
 * 
 * @param string $message Správa na logovanie
 * @param array $context Dodatočný kontext (voliteľné)
 */
function dnt_log_notice(string $message, array $context = []): void
{
    Logger::getInstance()->notice($message, $context);
}

/**
 * Logovanie deprecated warning
 * 
 * @param string $message Správa na logovanie
 * @param array $context Dodatočný kontext (voliteľné)
 */
function dnt_log_deprecated(string $message, array $context = []): void
{
    Logger::getInstance()->deprecated($message, $context);
}


