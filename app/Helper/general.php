<?php

function getFolder() {
    // this function return css folder file if rtl or ltr
    return app()->getLocale() == 'ar' ? 'css-rtl' : 'css';
}
