<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class Setting extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'isIOSUnderReview' => $this->ios_under_review,
            'isAndroidUnderReview' => $this->android_under_review,
            'androidVersion' => [
                'versionName' => $this->android_version_name,
                'isForceUpdate' => $this->android_force_update,
            ],
            'iosVersion' => [
                'versionName' => $this->ios_version_name,
                'isForceUpdate' => $this->ios_force_update,
            ],
        ];
    }
}
