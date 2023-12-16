<?php

namespace App\Http\Controllers\v1;

use App\Domains\Courses\SessionServiceInterface;
use App\Domains\Courses\Specs\GetUserHistoryInput;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function __construct(
        private SessionServiceInterface $sessionService
    )
    {
    }

    public function history(Request $request, JsonResponse $response) : JsonResponse
    {
        $spec = new GetUserHistoryInput();
        $spec->userId = $request->get('user_id') ?? 1;
        $spec->withCategories = $request->get('with_categories') == '1';

        $output = $this->sessionService->getUserHistory($spec);

        return $response
            ->setStatusCode(200)
            ->setData([
                'data' => $output->history,
                'categories' => $output->categories ?? [],
            ]);
    }
}
