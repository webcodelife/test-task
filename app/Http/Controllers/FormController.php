<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequest;
use App\Services\FormService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function showForm(Request $request): Application|Factory|View
    {
        return view('form', [
            'success' => $request->boolean('success'),
        ]);
    }

    public function submitForm(FormRequest $formRequest, FormService $formService): JsonResponse
    {
        if (($bag = $formRequest->formValidator?->getMessageBag()) && $bag->messages()) {
            return response()->json([
                'success' => false,
                'messages' => $bag->all(),
            ]);
        }

        $error = $formService->process($formRequest->getDTO());
        if ($error) {
            return response()->json([
                'success' => false,
                'messages' => [$error],
            ]);
        }

        return response()->json([
            'success' => true,
        ]);
    }

    // no ajax case
    // public function submitForm(FormRequest $formRequest, FormService $formService)
    // {
    //     $error = $formService->process($formRequest->getDTO());
    //
    //     if ($error) {
    //         return redirect()->route('form.show')
    //             ->withInput()
    //             ->withErrors(['email' => $error]);
    //     }
    //
    //     return redirect()->route('form.show', ['success' => true]);
    // }
}
