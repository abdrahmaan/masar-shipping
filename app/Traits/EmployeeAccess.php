<?php
namespace App\Traits;

trait EmployeeAccess
{
    public function checkEmployeeHasAccess($permission)
    {
        $user_permissions = session()->get("permissions");

        if (!in_array($permission,$user_permissions)) {
            return abort(500);
        }
    }
}

?>
