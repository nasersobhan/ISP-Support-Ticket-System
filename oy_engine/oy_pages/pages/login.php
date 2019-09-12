<?php

if (is_loggedin()) {
    echo 'loggedin';exit();
}else{

}

if (isset($_GET['k'])) {
    $arrkey = $_GET['k'];
    $sess= $_GET['s'];
    $_SESSION[$arrkey]['session'] = $sess;
    if (isset($_SESSION['redirect'])) {
        $reee = $_SESSION['redirect'];
        unset($_SESSION['redirect']);
        if ($_SESSION['redirect'] != 'http://stark.test/?pg=login') {
            redirect_to($reee);
        }
    } else {
        echo  redirect_to(HOME, true);
    }
}

if (is_get('log')) {

    $curr = HOME.'?pg=login';
    if (is_get('red')) {
        $curr=is_get('red');
    }
    if (isset($_SESSION['redirectorx'])) {
        $curr = $_SESSION['redirectorx'];
    }
     
    if ($curr != 'http://stark.test/?pg=login') {
        redirect_to(ACCHOME . '?pg=login&red='.$curr);
    }else
        redirect_to(ACCHOME . '?pg=login');
    exit();
} elseif (is_loggedin()) {
    if (isset($_SESSION['redirect'])) {
        $reee = $_SESSION['redirect'];
        unset($_SESSION['redirect']);
        if ($reee != 'http://stark.test/?pg=login') {
            redirect_to($reee);
        }
    } else {
        redirect_to(HOME);
    }
}

//print_r($_SESSION);
