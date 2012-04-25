<?php

class card_member {
    public $code = '';
    public $type = '';
    public $expire = '';

    function card_member($customers_email) {
        if ($customers_email) {
            $query = tep_db_query('SELECT code, DATE_FORMAT(enddate, \'%d/%m/%Y\') as enddate, obtained FROM '.TABLE_COUPONS.' WHERE CONCAT(enddate, " 23:59:59") >= NOW() AND email = "'.$customers_email.'" AND obtained IN("saphir", "rubis", "gold") GROUP BY id');
            $rs = tep_db_fetch_array($query);
            if (!empty($rs['code'])) {
                $this->code = $rs['code'];
                $this->type = $rs['obtained'];
                $this->expire = $rs['enddate'];
            }
        }
    }
    
    function is_member() {
        list($day, $month, $year) = explode ('/', $this->expire);
        list($c_day, $c_month, $c_year) = explode ('/', date('d/m/Y'));
        return
            !empty ($this->expire) && (
                $c_day < $year ||
                $c_day == $year  && $c_month < $month ||
                $c_day == $year  && $c_month == $month && $c_day <= $day
            );
    }
}

?>