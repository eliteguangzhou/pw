<?php
if ($card_member->is_member())
    echo sprintf(ALREADY_MEMBER, $card_member->expire);
elseif (!empty($_GET['tx']) && !empty($_GET['st']) && $_GET['st'] == 'Completed') {
    $amt = (int) $_GET['amt'];
    if ($amt == 50 || $amt == 150 || $amt == 250) {
        switch($amt) {
            case 50 : $expire_month = 1;$card='saphir';break;
            case 150 : $expire_month = 4;$card='rubis';break;
            case 250 : $expire_month = 6;$card='gold';break;
        }
        //Recuperation longueur code coupon
        $query = tep_db_query('SELECT configuration_value FROM '.TABLE_CONFIGURATION.' WHERE configuration_key = "EASY_COUPONS"');
        $rs = tep_db_fetch_array($query);
        $rs = explode(';', $rs['configuration_value']);
        $code_length = $rs[9];

        //Calcul des dates
        $today = new DateTime();
        $today->modify('-7 hour');
        $expire = new DateTime();
        $expire->modify('+'.$expire_month.' month');
        $expire->modify('-7 hour');
        
        //Ajout membres
        tep_db_query('INSERT INTO '.TABLE_MEMBERS.' SET tx="'.htmlentities($_GET['tx']).'", customers_id = '.$customer_id.', date = NOW()');
        //Ajout coupon
        $code = gen_coupon_code($code_length);
        tep_db_query('INSERT INTO '.TABLE_COUPONS.' SET code="'.$code.'", email = "'.$customer_email_address.'", enddate = "'.$expire->format('y-m-d').'" , discount = "15.00", type ="p", obtained = "'.$card.'"');

        $query = tep_db_query('SELECT customers_gender FROM '.TABLE_CUSTOMERS.' WHERE customers_id = '. $customer_id);
        $rs = tep_db_fetch_array($query);
        $gender = '';
        if ($rs['customers_gender'] == 'm')
            $gender = 'M. ';
        elseif ($rs['customers_gender'] == 'f')
            $gender = 'Mme. ';

        //Envoi mail client
        tep_mail(
                $customer_first_name . ' ' . $customer_last_name,
                $customer_email_address,
                HTML_EMAIL_SUBJECT,
                sprintf(HTML_EMAIL, $customer_email_address, $code, $gender . $customer_last_name, strtoupper($card), $code, $today->format('d/m/Y'), $expire->format('d/m/Y')),
                STORE_NAME,
                STORE_OWNER_EMAIL_ADDRESS
            );
        //Envoi mail parfumwholesale
        tep_mail(
                STORE_NAME,
                STORE_OWNER_EMAIL_ADDRESS,
                HTML_EMAIL_SUBJECT_PWS,
                sprintf(HTML_EMAIL_PWS, $customer_first_name, $customer_last_name, $customer_email_address, $card, $expire->format('d/m/Y'), $_GET['tx']),
                STORE_NAME,
                STORE_OWNER_EMAIL_ADDRESS
            );
        echo sprintf(CARD_BOUGHT, $code, $expire->format('d/m/Y'));
    }
}?>
