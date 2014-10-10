<?php

namespace System;

/**
 * Helper class
 * 
 * @author Gevorg Makaryan <makaryan.gevorg@gmail.com>
 */
class Helper
{
    /**
     * Gets the user helper
     * 
     * @return \Helper\User
     */
    public function getUser()
    {
        return new \Helper\User();
    }
}
