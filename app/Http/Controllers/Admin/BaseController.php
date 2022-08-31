<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    protected $crudNotAccepted = [];

    public function prepareParams($params): array
    {
        return array_diff_key($params, array_flip($this->crudNotAccepted));
    }
}
