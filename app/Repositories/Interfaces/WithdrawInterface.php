<?php

namespace App\Repositories\Interfaces;

interface WithdrawInterface{
    public function get_all_withraw($request);
    public function get_pending_withraw($request);
    public function get_approved_withraw($request);
    public function get_rejected_withraw($request);
    public function withraw_status_change($request);
    public function withraw_delete($request);
}
