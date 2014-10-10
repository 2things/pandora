<?php

namespace System;

/**
 * Translation class
 * 
 * @author Makaryan Gevorg <makaryan.gevorg@gmail.com>
 */
class Translation
{
    /**
     * Gets the translation
     * 
     * @param string $lang
     * 
     * @return array
     * 
     * @throws \Exception
     */
    public function get($lang)
    {
        if (!file_exists(PATH_TRANSLATION . '/' . $lang . '.php')) {
            throw new \Exception('Translation is not exists');
        }
        
        return include PATH_TRANSLATION . '/' . $lang . '.php';
    }
}