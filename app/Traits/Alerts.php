<?php
namespace App\Traits;

trait Alerts 
{
    public function flashback($resource, $message) 
    {
        $status = 'fail';
        $message = $message.' is failed!';
        
        if($resource)
        {
            $status = 'success';
            $message = $message.' is succesful!';
        }
        
        return [$status, $message];
    }
}
