<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use Illuminate\Pagination\LengthAwarePaginator;

class BusinessManagerController extends Controller
{
    public function index()
    {
        $businessManagers = [
            (object)[ 'id' => 1, 'name' => 'BM 1', 'credit_limit' => 1000 ],
            (object)[ 'id' => 2, 'name' => 'BM 2', 'credit_limit' => 2000 ],
            (object)[ 'id' => 3, 'name' => 'BM 3', 'credit_limit' => 3000 ],
            (object)[ 'id' => 4, 'name' => 'BM 4', 'credit_limit' => 4000 ],
            (object)[ 'id' => 5, 'name' => 'BM 5', 'credit_limit' => 5000 ],
            (object)[ 'id' => 6, 'name' => 'BM 6', 'credit_limit' => 6000 ],
            (object)[ 'id' => 7, 'name' => 'BM 7', 'credit_limit' => 7000 ],
            (object)[ 'id' => 8, 'name' => 'BM 8', 'credit_limit' => 8000 ],
            (object)[ 'id' => 9, 'name' => 'BM 9', 'credit_limit' => 9000 ],
            (object)[ 'id' => 10, 'name' => 'BM 10', 'credit_limit' => 10000 ],
            (object)[ 'id' => 11, 'name' => 'BM 11', 'credit_limit' => 11000 ],
            (object)[ 'id' => 12, 'name' => 'BM 12', 'credit_limit' => 12000 ],
            (object)[ 'id' => 13, 'name' => 'BM 13', 'credit_limit' => 13000 ],
            (object)[ 'id' => 14, 'name' => 'BM 14', 'credit_limit' => 14000 ],
            (object)[ 'id' => 15, 'name' => 'BM 15', 'credit_limit' => 15000 ],
            (object)[ 'id' => 16, 'name' => 'BM 16', 'credit_limit' => 16000 ],
            (object)[ 'id' => 17, 'name' => 'BM 17', 'credit_limit' => 17000 ],
            (object)[ 'id' => 18, 'name' => 'BM 18', 'credit_limit' => 18000 ],
            (object)[ 'id' => 19, 'name' => 'BM 19', 'credit_limit' => 19000 ],
            (object)[ 'id' => 20, 'name' => 'BM 20', 'credit_limit' => 20000 ],
            (object)[ 'id' => 21, 'name' => 'BM 21', 'credit_limit' => 21000 ],
            (object)[ 'id' => 22, 'name' => 'BM 22', 'credit_limit' => 22000 ],
            (object)[ 'id' => 23, 'name' => 'BM 23', 'credit_limit' => 23000 ],
            (object)[ 'id' => 24, 'name' => 'BM 24', 'credit_limit' => 24000 ],
            (object)[ 'id' => 25, 'name' => 'BM 25', 'credit_limit' => 25000 ],
            (object)[ 'id' => 26, 'name' => 'BM 26', 'credit_limit' => 26000 ],
            (object)[ 'id' => 27, 'name' => 'BM 27', 'credit_limit' => 27000 ],
            (object)[ 'id' => 28, 'name' => 'BM 28', 'credit_limit' => 28000 ],
            (object)[ 'id' => 29, 'name' => 'BM 29', 'credit_limit' => 29000 ],
            (object)[ 'id' => 30, 'name' => 'BM 30', 'credit_limit' => 30000 ],
        ];

        $perPage = 10; // 每页显示的项目数
        $page = LengthAwarePaginator::resolveCurrentPage();
        $pagination = new LengthAwarePaginator(
            array_slice($businessManagers, ($page - 1) * $perPage, $perPage),
            count($businessManagers),
            $perPage,
            $page,
            ['path' => LengthAwarePaginator::resolveCurrentPath()]
        );

        return view('welcome', ['businessManagers' => $pagination]);
    }

    public function createChildBM(Request $request)
    {
        $request->validate([
            'parentBmId' => 'required',
            'bmName' => 'required',
            'shared_page_id' => 'required',
            'bmVertical' => 'required',
            'access_token' => 'required',
            'appsecret_proof' => 'required',
        ]);

        $url = 'https://graph.facebook.com/v12.0/' . $request->parentBmId . '/owned_businesses';
        $fields = [
            'id' => $request->parentBmId,
            'name' => $request->bmName,
            'vertical' => $request->bmVertical,
            'shared_page_id' => $request->shared_page_id,
            'page_permitted_tasks' => json_encode(["ADVERTISE", "ANALYZE"]),
            'timezone_id' => 1,
            'access_token' => $request->access_token,
            'appsecret_proof' => $request->appsecret_proof,
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($fields));

        $response = curl_exec($ch);
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if (curl_errno($ch)) {
            $error_message = curl_error($ch);
            curl_close($ch);
            return response()->json(['error' => 'CURL Error: ' . $error_message], 500);
        }

        curl_close($ch);

        if ($status == 200) {
            return response()->json(json_decode($response));
        } else {
            return response()->json(['error' => 'Failed to create child BM', 'details' => json_decode($response)], $status);
        }
        
    }
}