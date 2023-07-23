<?php

namespace App\Providers;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;
use Symfony\Component\HttpFoundation\Response as Http;

class ResponseServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Response::macro('success', function ($data = [], $status = Http::HTTP_OK, $message = 'Successfully!', array $headers = [], $options = 0) {
            if (is_scalar($data)) {
                $data = ['data' => $data];
            } elseif ($data instanceof Arrayable) {
                $data = $data->toArray();
            } elseif ($data instanceof JsonResource) {
                $data = $data->response()->getData(true);
            }

            if (! Arr::has($data, 'data')) {
                $data = ['data' => $data];
            }

            $default = ['success' => true, 'message' => $message, 'status' => $status];

            $data = array_merge($default, $data);

            return Response::json($data, $status, $headers, $options);
        });

        Response::macro('error', function ($data = [], $status = Http::HTTP_INTERNAL_SERVER_ERROR, $message = 'Error!', array $headers = [], $options = 0) {
            $default = ['success' => false, 'status' => $status, 'message' => $message];

            if (is_scalar($data)) {
                $data = ['data' => $data];
            }

            $data = array_merge($default, $data);

            return Response::json($data, $status, $headers, $options);
        });
    }
}
