<?php

return array(
    'common' => array(
        'error' => 'Sorry, somethig went wrong. PLease try again latter.',
    ),
    'signup' => array(
        'invalidEmail' => 'Your provided e-mail is not valid. Please use your correct e-mail address.', 
        'emailExist' => 'Your provided e-mail is already in use. Please choose another e-mail address.', 
        'invalidUsername' => 'Your provided username is not valid. Username can contain only letters and numbers and _ . symbols and should be at least 2 and maximum 31 charachters.', 
        'usernameExist' => 'Your provided username is already in use. Please choose another one.',
        'passwordMatchError' => 'Passwords should be matched.',
        'passwordEmptyError' => 'Password cannot be empty.',
    ),
    'login' => array(
        'failed' => 'Username and password combination is wrong.'
    ),
    'task' => array(
        'titleMaxLength' => 'Sorry, the length of the task exceeds the allowable length (254 characters).'
    ),
);