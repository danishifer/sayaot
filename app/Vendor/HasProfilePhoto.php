<?php

namespace App\Vendor;

use Laravel\Jetstream\HasProfilePhoto as VHasProfilePhoto;

trait HasProfilePhoto
{
    use VHasProfilePhoto;

    protected function defaultProfilePhotoUrl(): string
    {
        return 'https://ui-avatars.com/api/?name=' . urlencode("{$this->first_name} {$this->last_name}") . '&color=7F9CF5&background=EBF4FF';
    }
}
