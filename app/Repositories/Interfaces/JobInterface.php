<?php

namespace App\Repositories\Interfaces;

interface JobInterface
{
    public function get_all_jobs($request);
    public function get_job_details($id);
    public function job_update($request);
    public function job_update_status($request);
    public function get_pending_job($request);
    public function get_approved_job($request);
    public function get_rejected_job($request);
}
