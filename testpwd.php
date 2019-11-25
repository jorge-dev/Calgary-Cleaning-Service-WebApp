<?php
// See the password_hash() example to see where this came from.
$hash = '$2y$10$YoSksLLTCbmVhpZoFcHfIu4PA1DmDL87.FBHsxU429pEtopIQiD/6';

if (password_verify('test', $hash)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}
?>