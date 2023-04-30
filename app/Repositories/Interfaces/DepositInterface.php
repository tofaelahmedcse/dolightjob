<?php

namespace App\Repositories\Interfaces;

interface DepositInterface
{
    public function get_all_deposit($request);
    public function get_pending_deposit($request);
    public function get_approved_deposit($request);
    public function get_rejected_deposit($request);
    public function update_deposit_status($request);
    public function delete_deposit($request);
}
