<?php

function getFolder() {
    // this function return css folder file if rtl or ltr
    return app()->getLocale() == 'ar' ? 'css-rtl' : 'css';
}


function getGuard() {
    // check guard
    // we use it , for validate admin requests
    if(auth('admin')) {
        return true;
    }
    return false;
}
