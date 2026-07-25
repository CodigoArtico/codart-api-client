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
        $url = $baseUrl . $endpoint;
        $token = config('services.codart_api.token');
        $method = strtoupper($validated['method'] ?? 'GET');
        $params = $validated['params'] ?? [];

        try {
            $http = Http::withToken($token)
                ->acceptJson()
                ->timeout(30);

            if ($method === 'POST') {
                $response = $http->post($url, $params);
            } else {
                $response = $http->get($url, $params);
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
