<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiQueryController extends Controller
{
    /**
     * Display the queries client dashboard view.
     */
    public function index()
    {
        return view('queries.index');
    }

    /**
     * Handle API requests to Codart API securely.
     */
    public function query(Request $request)
    {
        $validated = $request->validate([
            'endpoint' => 'required|string',
            'method'   => 'nullable|string|in:GET,POST',
            'params'   => 'nullable|array',
        ]);

        $baseUrl = rtrim(config('services.codart_api.base_url'), '/');
        $endpoint = '/' . ltrim($validated['endpoint'], '/');
        $method = strtoupper($validated['method'] ?? 'GET');
        $params = $validated['params'] ?? [];

        // Dynamic URL path variable substitution (e.g., /api/v1/consultas/reniec/dni/{dni})
        foreach ($params as $key => $val) {
            $placeholder = '{' . $key . '}';
            if (str_contains($endpoint, $placeholder)) {
                $endpoint = str_replace($placeholder, urlencode($val), $endpoint);
                unset($params[$key]);
            }
        }

        $url = $baseUrl . $endpoint;
        $token = config('services.codart_api.token');

        try {
            // Special handling for Facial Top image upload (converting Base64 to multipart file attachment)
            if (isset($params['image_facial']) && is_string($params['image_facial']) && !empty($params['image_facial'])) {
                $base64Str = $params['image_facial'];
                if (str_contains($base64Str, ';base64,')) {
                    $base64Str = explode(';base64,', $base64Str)[1];
                }
                $binaryImage = base64_decode($base64Str);
                unset($params['image_facial']);

                $response = Http::withToken($token)
                    ->acceptJson()
                    ->timeout(50)
                    ->attach('image_facial', $binaryImage, 'facial.jpg')
                    ->post($url, $params);
            } else {
                $http = Http::withToken($token)
                    ->withHeaders([
                        'Accept' => 'application/json',
                        'Content-Type' => 'application/json',
                    ])
                    ->timeout(50);

                if ($method === 'POST') {
                    $response = $http->post($url, $params);
                } else {
                    $response = $http->get($url, $params);
                }
            }

            return response()->json([
                'status' => $response->status(),
                'success' => $response->successful(),
                'url' => $url,
                'data' => $response->json() ?? $response->body(),
            ], $response->status());
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'success' => false,
                'message' => 'Error al conectar con la API de Codart: ' . $e->getMessage(),
            ], 500);
        }
    }
}
