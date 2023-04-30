<?php
namespace App\Repositories\Interfaces;

interface UserInterface{

    public function get_all_users($request);
    public function get_active_users($request);
    public function get_inactive_users($request);
    public function get_blocked_users($request);
    public function update_user($request);
    public function delete_user($id);
}
